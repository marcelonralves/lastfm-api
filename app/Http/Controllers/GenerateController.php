<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateRequest;
use App\Repository\GenerateRepository;

class GenerateController extends Controller
{
    public function __construct(
        private GenerateRepository $repository
    ) { }

    public function render(GenerateRequest $request)
    {
        $renderArtists = $this->repository->render($request->input('username'));

        return view('generate', compact('renderArtists'));
    }
}
