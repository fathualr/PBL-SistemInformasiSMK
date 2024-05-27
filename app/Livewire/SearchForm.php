<?php

// namespace App\Livewire;

// use Livewire\Component;
// use App\Models\FormPPDB;

// class SearchForm extends Component
// {
//     public $searchTerm;

//     public function render()
//     {
//         $forms = FormPPDB::where('nama_lengkap', 'like', '%' . $this->searchTerm . '%')
//                         ->orWhere('nisn', 'like', '%' . $this->searchTerm . '%')
//                         ->orWhere('no_hp', 'like', '%' . $this->searchTerm . '%')
//                         ->get();

//         return view('livewire.search-form', ['forms' => $forms]);
//     }
// }