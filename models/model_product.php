<?php

class model_product extends Model
{
    function productInfo($id)
    {

        $sql = "select * from tbl_books where id=?";
        $bookInfo = $this->doSelect($sql, [$id], 1);
        //inja az methode calculate ke dar model asli neveshtim estefade mikonim
        $price = $bookInfo['gheymat'];
        $discount = $bookInfo['takhfif'];
        $calculate = $this->calculateDiscount($price, $discount);
        $bookInfo['discount_price'] = $calculate[0];
        $bookInfo['total_price'] = $calculate[1];

        //In baraye name entesharate ketabe entekhab shode
        $idEnt = $bookInfo['identesharat'];
        $entInfo = $this->entesharatInfo($idEnt);
        $thisBookEntName = $entInfo['nam'];
        $bookInfo['thisBookEntName'] = $thisBookEntName;

        /*$thisBookName = $bookInfo['esm'];
        $allEntesharats = $this->getAllEntesharats($thisBookName);
        $bookInfo['entesharats'] = $allEntesharats;*/

        /*$entesharatIdsString = $bookInfo['identesharat'];
        $entesharatIdsArray = explode(',', $entesharatIdsString);
        $entIds = array_filter($entesharatIdsArray);
        $entesharats = [];
        foreach ($entIds as $entId) {
            $entInfo = $this->entesharatInfo($entId);
            array_push($entesharats, $entInfo);
        }
        $bookInfo['entesharats'] = $entesharats;*/

        $idCatStr = $bookInfo['idcategory'];
        $idCatArr = explode(',', $idCatStr);
        $idCatArr = array_filter($idCatArr);
        $bookCats = [];
        foreach ($idCatArr as $row) {
            $bookCatInfo = $this->catInfo($row);
            array_push($bookCats, $bookCatInfo);
        }
        $bookInfo['bookCats'] = $bookCats;

        return $bookInfo;
    }

    function entesharatInfo($entId)
    {
        $sql = "select * from tbl_entesharat where id=?";
        $res = $this->doSelect($sql, [$entId], 1);
        return $res;
    }

    function getAllEntesharats($bookName)
    {
        $sql = "select * from tbl_books where esm=?";
        $allSameNameBooks = $this->doSelect($sql, [$bookName]);

        $allEnt = [];
        foreach ($allSameNameBooks as $book) {
            $idEnt = $book['identesharat'];
            $entInfo = $this->entesharatInfo($idEnt);
            array_push($allEnt, $entInfo);
        }
        return $allEnt;
    }

    function getProperties($idbook)
    {
        $sql = "select * from tbl_property where idbook=?";
        $res = $this->doSelect($sql, [$idbook]);
        return $res;
    }

    function catInfo($idCat)
    {
        $sql = "select * from tbl_category where id=?";
        $res = $this->doSelect($sql, [$idCat], 1);
        return $res;
    }

    function getComments($idbook)
    {
        $sql = "select * from tbl_user_comments where idbook=?";
        $result = $this->doSelect($sql, [$idbook]);
        return $result;
    }

    function updateLikes($idbook, $likedNum)
    {
        $sql = "select * from tbl_books where id=?";
        $res = $this->doSelect($sql, [$idbook], 1);
        $new_like_num = $res['like_num'];
        if ($likedNum == 1) {
            $new_like_num = $new_like_num - 1;
        } else {
            $new_like_num = $new_like_num + 1;
        }

        $sql = "update tbl_books set like_num = " . $new_like_num . " where id = ? ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $idbook);
        $stmt->execute();
    }

    function getQuestions($idbook)
    {
        $sql = "select * from tbl_question where parent=0 and idbook=?";
        $result = $this->doSelect($sql, [$idbook]);

        //be jaye inke yek query dar yek halghe modam tekrar shavad(baraye behine sazi pishnehad nemishavad), yek bar kole eteleaat ra gerefte va satrhaye morede niaz ra ba halghe migirim=>

        $sql = "select * from tbl_question where parent!=0";
        $all_answers = $this->doSelect($sql);
        $all_answers_new = [];
        foreach ($all_answers as $answer) {
            $questionId = $answer['parent'];
            $all_answers_new[$questionId] = $answer;
        }
        //end getting answers : [ [idquestion]=> answersInfo]

        return [$result, $all_answers_new];
    }

    function updateLikeCount($hasClass, $idbook, $likeCount)
    {
        if ($hasClass == 1) {
            $new_likeCount = $likeCount + 1;
        }
        if ($hasClass == 0) {
            $new_likeCount = $likeCount - 1;
        }
        $sql = "update tbl_user_comments set like_count = " . $new_likeCount . " where idbook=?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $idbook);
        $stmt->execute();
    }

    function updateDisLikeCount($hasClass, $idbook, $dislikeCount)
    {
        if ($hasClass == 1) {
            $new_dislikeCount = $dislikeCount + 1;
        }
        if ($hasClass == 0) {
            $new_dislikeCount = $dislikeCount - 1;
        }
        $sql = "update tbl_user_comments set dislike_count = " . $new_dislikeCount . " where idbook=?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $idbook);
        $stmt->execute();
    }
}