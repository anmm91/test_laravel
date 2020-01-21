<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function relationExistence(){
        // i need to return teacher with at least one course
        $teacher=Teacher::has('courses')->get();
        //ineed to return teacher with at least two course
        $teacher=Teacher::has('courses','>=',2)->get();
        // need to customize more so use whereHas
        // need to return teacher with at least one course with condition
        $teacher=Teacher::whereHas('courses',function ($query){
            $query->where('name','french');
        })->get();
        //need to return teacher with at least 2 course with condition
        $teacher=Teacher::whereHas('courses',function ($query){
            $query->where('name','french');
        },'>=',2)->get();
        return $teacher;
    }
    public function relationAbsence(){
        //retrive teacher with no courses
        $teacher=Teacher::doesntHave('courses')->get();
        //customize using whereDoentHave
        // no course  no   (name=english`)
        $teacher=Teacher::whereDoesntHave('courses',function ($query){
            $query->where('name','english');
        })->get();
        return $teacher;
    }

    public function relationCount(){
        //return number of teacher for each course
        $teacher=Teacher::withCount('courses')->get();
//        $teacher=$teacher[0]->courses_count;                   //teacher[0] represent teacher with id=1
        $teacher=$teacher[1]->courses_count;                   //teacher[1] represent teacher with id=2

        // multiple count for multiple relation
        $teacher=Teacher::withCount([
            'courses','students'=>function($query){
//            $query->
            }
        ])->get();

        // use as to alias name
        $teacher=Teacher::withCount([
            'courses','courses as test_count'
        ])->get();
        $teacher=$teacher[0]->test_count;
        return $teacher;
//        $teacher=$teacher[0]->courses_count;
//        $student=$teacher[0]->students_count;
//        return $student;

    }
}
