<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

DB::enableQueryLog();

class IndexController extends Controller
{
    public function Index() {
        $header = "Резюме и вакансии";
        $result = Person::All();
        return view('page', compact('header', 'result'));
    }
    public function Show() {
        $data = array(
            "name" => "Иван Иванов",
            "occupation" => "Программист",
            "phoneNumber" => "55-55-55",
            "exp" => "4 года",
            "pic" => "ava12.jpg"
        );
        return view('cv', $data);
    }

    public function StageBetween() {
        $header = "Фамилии людей, имеющих стаж от 5 до 15 лет";
        $result = Person::whereBetween("Stage", [5, 15])->get();
        return view('between', compact('header', 'result'));
    }
    public function Programmer() {
        $header = "Фамилии и стаж людей с профессией Программист";
        $jobID = Staff::firstWhere('staff', 'Программист')->id;
        $result = Person::where('Staff', $jobID)->get();
        return view('between', compact('header', 'result'));
    }
    public function GeneralCount() {
        $result = Person::All()->count();
        return view('count', compact('result'));
    }
    public function Unique() {
        $jobID = Person::select('Staff')->distinct()->get();
        $result = Staff::whereIn('id', $jobID)->get();
        return view('jobs', compact('result'));
    }

    public function Create() {
        $header = "Добавление резюме";
        $jobs = Staff::All();
        return view('add-content', compact('header', 'jobs'));
    }
    public function Store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'fullName' => 'required|max:50',
            'phone' => 'required|regex:/^(\d{2}(\-)?){2}(\-)?(\d{2})$/',
            'exp' => 'required',
            'photo' => 'required|image',
        ], [
            'fullName.required' => 'ФИО обязательно для заполнения',
            'fillName.max' => 'Поле "ФИО" не может превышать 50 символов',
            'phone.required' => 'Номер телефона обязателен для заполнения',
            'phone.regex' => 'Номер телефона должен быть в формате xx-xx-xx или xxxxxx',
            'exp.required' => 'Стаж обязателен для заполнения',
            'photo.required' => 'Необходимо загрузить аватар',
        ]);
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'ava' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);

            $cv = new Person;
            $cv->FIO = $request->fullName;
            $cv->Staff = $request->staff;
            $cv->Phone = $request->phone;
            $cv->Stage = $request->exp;
            $cv->Image = $filename;
            $cv->save();
        }
        return redirect(route('home'));
    }
}
?>