<?php

spl_autoload_register(function($class) {
    include "../commonClasses/" . $class . ".php";
});

class QuestionAnswer {

    private $tableq = "question";
    private $tablea = "answer";

    public function getAllQues() {
        return Main::selectAll($this->tableq);
    }

    public function addQuestionAns($data) {
        $question = Validation::validate($data['question']);
        $ans1 = Validation::validate($data['ans1']);
        $ans2 = Validation::validate($data['ans2']);
        $ans3 = Validation::validate($data['ans3']);
        $ans4 = Validation::validate($data['ans4']);
        $rightAnswer = Validation::validate($data['right_answer']);

        if ($question == "" || $ans1 == "" || $ans2 == "" || $ans3 == "" || $ans4 == "") {
            return Variable::$empty;
        } elseif ($rightAnswer < 1 && $rightAnswer > 4) {
            return Variable::$invalid;
        } else {
            $params = array('question_desc' => $question);
            Main::insert($this->tableq, $params);
            $lastQuestionId = $this->lastQuestionId();
            foreach ($lastQuestionId as $s) {
                $lastId = $s['question_id'];
            }
            if ($rightAnswer == "1") {
                $params1 = array('question_id' => $lastId, 'right_ans' => 1, 'ans' => $ans1);
            } else {
                $params1 = array('question_id' => $lastId, 'right_ans' => 0, 'ans' => $ans1);
            }
            if ($rightAnswer == "2") {
                $params2 = array('question_id' => $lastId, 'right_ans' => 1, 'ans' => $ans2);
            } else {
                $params2 = array('question_id' => $lastId, 'right_ans' => 0, 'ans' => $ans2);
            }
            if ($rightAnswer == "3") {
                $params3 = array('question_id' => $lastId, 'right_ans' => 1, 'ans' => $ans3);
            } else {
                $params3 = array('question_id' => $lastId, 'right_ans' => 0, 'ans' => $ans3);
            }
            if ($rightAnswer == "4") {
                $params4 = array('question_id' => $lastId, 'right_ans' => 1, 'ans' => $ans4);
            } else {
                $params4 = array('question_id' => $lastId, 'right_ans' => 0, 'ans' => $ans4);
            }

            Main::insert($this->tablea, $params1);
            Main::insert($this->tablea, $params2);
            Main::insert($this->tablea, $params3);
            Main::insert($this->tablea, $params4);
            return Variable::$success;
        }
    }

    public function removeQuestion($question_id) {
        if (Main::chkExist($this->tableq, "question_id", $question_id)) {
            Main::deleteBy($this->tableq, "question_id", $question_id);
            Main::deleteBy($this->tablea, "question_id", $question_id);
            return Variable::$questionRemove;
        } else {
            return Variable::$failed;
        }
    }

    public function lastQuestionId() {
        $query = "SELECT question_id FROM question ORDER BY question_id DESC LIMIT 1";
        $params = array();
        return DB::query($query, $params);
    }

    public function processResult($data, $category_id) {
        $i = -1;
        foreach ($data as $s) {
            $i++;
        }
        $ans[$i] = array();
        $b = 0;
        for ($a = 0; $a < $i; $a++) {
            $b++;
            $ans[$a] = $data['ans' . $b . ''];
        }
        $result = 0;
        $query = "SELECT ans FROM $this->tablea where right_ans=1 AND question_id IN "
                . "(SELECT question_id FROM question where category_id = :c_id)";
        $params = array(':c_id' => $category_id);
        $getRightAns = DB::query($query, $params);

        for ($a = 0; $a < $i; $a++) {
            if ($ans[$a] == $getRightAns[$a][0]) {
                $result++;
            }
        }
        return $result;
        ;
    }

    public function showAnswer($category_id) {
        $i = 0;
        $allQues = Main::selectBy("*", "question", "category_id", $category_id);
        foreach ($allQues as $s) {
            $i++;
            echo '<tr>
                            <td colspan="2">
                                <h3>Question ' . $i . ' : ' . $s['question_desc'] . '</h3>
                            </td>
                        </tr>';
            $query = "SELECT * FROM answer where question_id=:q AND right_ans = 1";
            $params = array(':q'=>$s['question_id']);
            $allAnsById = DB::query($query, $params);
            //$allAnsById = Main::selectBy("*", "answer", "question_id", $s['question_id']);
            $a = 0;
            foreach ($allAnsById as $ans) {
                $a++;
                echo '<tr>
                                    <td>
                                        Answer : '.$ans['ans'].'
                                    </td>
                                </tr>';
            }
        }
    }

}
?>

