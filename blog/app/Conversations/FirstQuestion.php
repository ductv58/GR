<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\QuestionRecommender;
use App\Model\Branch;

class FirstQuestion extends Conversation
{
    /**
     * First question
     */
    protected $index = 0;
    protected $questionIndex = 0;
    protected $userS = [];
    protected $thisRecomment = [];
    protected $recommenderSystem = [];

    public function failAnswer()
    {
        $question = Question::create('câu trả lời không hợp lệ. Bạn có muốn')
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('A.Trả lời lại?')->value('a'),
                Button::create('B.Trả lời câu khác')->value('b'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'a') {
                    $this->say('ban chon A');
                    $this->askReason();
                } else {
                    $this->say('ban chon B');
                    $this->index++;
                    $this->askReason();
                }
            } else {
                if (($answer->getText() === 'A') || ($answer->getText() === 'a')) {
                    $this->say('ban chon A');
                    $this->askReason();
                } elseif (($answer->getText() === 'B') || ($answer->getText() === 'b')) {
                    $this->say('ban chon B');
                    $this->index++;
                    $this->askReason();
                } else {
                    $this->failAnswer();
                }
            }
        });
    }

    public function askReason()
    {
        $questionRSs = QuestionRecommender::all();
        foreach ($questionRSs as $key => $questionRS) {
            if ($key == $this->index) {
                $this->questionIndex = $questionRS->id;
                $question = Question::create($questionRS->content)
                    ->fallback('Unable to ask question')
                    ->callbackId('ask_reason')
                    ->addButtons([
                        Button::create('A.' . $questionRS->answer_a)->value('a'),
                        Button::create('B.' . $questionRS->answer_b)->value('b'),
                    ]);
                $this->ask($question, function (Answer $answer) {
                    if ($answer->isInteractiveMessageReply()) {
                        if ($answer->getValue() === 'a') {
                            $user = User::findOrFail(Auth::guard('user')->user()->id);
                            $user->questionRecommenders()->sync($this->questionIndex, ['answer' => 'a']);
                            $this->say('ban chon A');
                            $this->index++;
                            $this->askReason();
                        } else {
                            $user = User::findOrFail(Auth::guard('user')->user()->id);
                            $user->questionRecommenders()->sync($this->questionIndex, ['answer' => 'b']);
                            $this->say('ban chon B');
                            $this->index++;
                            $this->askReason();
                        }
                    } else {
                        if (($answer->getText() === 'A') || ($answer->getText() === 'a')) {
                            $user = User::findOrFail(Auth::guard('user')->user()->id);
                            $user->questionRecommenders()->sync($this->questionIndex, ['answer' => 'a']);
                            $this->say('ban chon A');
                            $this->index++;
                            $this->askReason();
                        } elseif (($answer->getText() === 'B') || ($answer->getText() === 'b')) {
                            $user = User::findOrFail(Auth::guard('user')->user()->id);
                            $user->questionRecommenders()->sync($this->questionIndex, ['answer' => 'b']);
                            $this->say('ban chon B');
                            $this->index++;
                            $this->askReason();
                        } else {
                            $this->failAnswer();
                        }
                    }
                });
            }
        }
        if ($this->index > (count($questionRSs)-1)) {
            $thisUser = User::findOrFail(Auth::guard('user')->user()->id);
            $thisUserQuestion = [];
            $questionLists = QuestionRecommender::all();
            $bracnhs = Branch::all();
            foreach ($questionLists as $key => $questionList) {
                $index = 0;
                foreach ($thisUser->questionRecommenders as $thisUserAnswer) {
                    if ($questionList->id == $thisUserAnswer->pivot->question_id) {
                        array_push($thisUserQuestion, $thisUserAnswer->pivot->answer);
                    }
                    $index++;
                    if ($index == (count($thisUser->questionRecommenders())-1)) {
                        array_push($thisUserQuestion, 'no answer');
                    }
                }
            }
            $userCurrents = User::all();
            foreach ($userCurrents as $userCurrent) {
                if ($thisUser->id != $userCurrent->id) {
                    $userCurrentQuestion = [];
                    $userCurrentRates = [];
                    $rating = [];
                    foreach ($questionLists as $key => $questionList) {
                        $index = 0;
                        foreach ($userCurrent->questionRecommenders as $userCurrentAnswer) {
                            if ($questionList->id == $userCurrentAnswer->pivot->question_id) {
                                array_push($userCurrentQuestion, $userCurrentAnswer->pivot->answer);
                            }
                            $index++;
                            if ($index == (count($userCurrent->questionRecommenders())-1)) {
                                array_push($userCurrentQuestion, 'no answer');
                            }
                        }
                    }
                    $currentUserS = array_diff_assoc($thisUserQuestion, $userCurrentQuestion);
                    $result = count($currentUserS)/((count($questionLists)*2)-count($currentUserS));
                    $this->userS[$userCurrent->id] = $result;
                    foreach ($bracnhs as $bracnh) {
                        $index = 0;
                        foreach ($userCurrent->branchs as $userCurrentBranch) {
                            if ($bracnh->id == $userCurrentBranch->pivot->branch_id) {
                                $userCurrentRates[$bracnh->id] = $userCurrentBranch->pivot->rate;
                            }
                            $index++;
                            if ($index == (count($userCurrent->branchs)-1)) {
                                $userCurrentRates[$bracnh->id] = 0;
                            }
                        }
                    }
                    foreach ($bracnhs as $bracnh) {
                        $rateM = 0;
                        foreach ($userCurrentRates as $userCurrentRate) {
                            $rateM = $rateM + $userCurrentRate;
                        }
                        $rateM = $rateM/count($userCurrentRates);
                        if (!isset($this->thisRecomment[$bracnh->id])) {
                            $this->thisRecomment[$bracnh->id]=0;
                        }
                        $this->thisRecomment[$bracnh->id] = $this->thisRecomment[$bracnh->id] + $result*($userCurrentRates[$bracnh->id]-$rateM);
                    }
                }
            }
            $sumUserS = 0;
            foreach ($this->userS as $userS) {
                $sumUserS = $sumUserS + $userS;
            }
            foreach ($bracnhs as $bracnh) {
                if (!isset($this->recommenderSystem[$bracnh->id])) {
                    $this->recommenderSystem[$bracnh->id] = 0;
                }
                $this->recommenderSystem[$bracnh->id] = ($this->thisRecomment[$bracnh->id])/$sumUserS;
                $this->say($bracnh->name.$this->recommenderSystem[$bracnh->id]);
            }
        }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
