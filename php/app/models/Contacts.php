<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 21.08.19
 * Time: 14:08
 */

class Contacts extends Model
{
    public  $table='contacts';
    public $deleted = 0;

    public function __construct($table)
    {
        parent::__construct($table);
        $this->_softDelete=true;
    }

    public static $addValidation = [
        'fname'=>[
            'display'=>'First Name',
            'required'=>true,
            'max'=>155
        ],
        'lname'=>[
            'display'=>'Last Name',
            'required'=>true,
            'max'=>155
        ]
    ];

    public function findByUserId($user_id, $params=[]){
        $conditions = [
            'conditions'=>'user_id = ?',
            'bind'=>[$user_id]
        ];

        $conditions = array_merge($conditions,$params);

        return $this->find($conditions);
    }

    public function displayName(){
        return $this->fname . ' '. $this->lname;
    }

    public function findByIdAndUserId($contact_id, $user_id,$params=[]){
        $conditions = [
            'conditions'=>'id = ? AND user_id = ?',
            'build'=>[$contact_id, $user_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->findFirst($conditions);
    }

}