<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        Gate::authorize(PermissionEnum::adminDashboard);

        return Inertia::render('Dashboard', [
            'allTransactions' => Transactions::get()->all(),
         ]);
    }
}
