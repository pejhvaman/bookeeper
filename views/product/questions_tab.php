<style>
    #question_ask {
        width: 100%;
        float: right;
    }

    #question_ask h4 {
        color: #6f6f6f;
        font-weight: normal;
    }

    #question_ask textarea {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        border: 1px solid #e9e9e9;
    }

    #all_questions {
        width: 100%;
        float: right;
    }

    .question {
        width: 100%;
        height: 200px;
        float: right;
        border: 1px solid #f5f5f5;
        background: #fafafa;
        border-radius: 8px;
    }

    .asker {
        width: 95%;
        height: 70px;
        margin: auto;
        border-bottom: 1px solid #e9e9e9;
    }

    .ask_by {
        color: #b6b6b6;
        line-height: 70px;
        font-size: 13.5pt;
    }

    .the_question {
        padding: 40px;
        float: right;
        width: 1155px;
        height: 50px;
    }

    .ques_text {
        width: 100%;
        height: 100%;
        color: #6f6f6f;
    }

    #answer {
        width: 60%;
        height: 100px;
        float: left;
        background: #cffcf9;
        border-radius: 30px;
        margin-top: 20px;
        margin-bottom: 40px;
        position: relative;
        padding: 24px;
    }

    #answer:after {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 20px 24px 20px;
        border-color: transparent transparent #cffcf9 transparent;
        position: absolute;
        top: 80px;
        left: -20px;
    }
</style>
<?php
$questions = $data[0];
$answers = $data[1];
?>
<h4>
    پرسش خود را مطرح کنید
</h4>
<textarea style="resize: none"></textarea>
<span class="addBtn" style="margin: 30px 0">
                    ثبت پرسش
                </span>

<?php
foreach ($questions as $question) {
?>
<div id="all_questions">
    <div class="question">
        <div class="asker">
            <span class="ques_icno"></span>
            <span class="ask_by">
                                   توسط
                            پژمان یزدان خواه
                            در تاریخ
                            <?= $question['tarikh'] ?>
                            </span>
        </div>
        <div class="the_question">
                            <span class="ques_text">
                                <?= $question['matn'] ?>
                            </span>
        </div>


    </div>

    <div id="answer">
             <span class="ques_text">
                <?= $answers[$question['id']]['matn']; ?>
             </span>
    </div>
    <?php
    }
    ?>
</div>