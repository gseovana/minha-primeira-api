<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

    abstract class AbstractRepository
    {

        /**
        * @var Model
        */
        private $model;

        public function __construct(Model $model)
        {
            $this->model = $model;
        }


        public function selectConditions($conditions)
        {
            $conditions = explode(';', $conditions);

            foreach ($conditions as $condition){
                $cond = explode(':', $condition);
                $this->model = $this->model->where($cond[0],  $cond[1], $cond[2]);
            }

        }


        public function selectFilter($filters)
        {
            $this->model = $this->model->selectRaw($filters);
        }


        public function getResult(){
            return $this->model;
        }

    }



?>
