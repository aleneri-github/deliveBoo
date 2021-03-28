<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
  public function admin() {
    return redirect()->route('admin.dishes.index');
  }
}
