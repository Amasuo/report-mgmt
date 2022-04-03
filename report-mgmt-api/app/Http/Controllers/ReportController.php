<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportService;

    public function __construct(Request $request, ReportService $reportService) {
        parent::__construct($request);
        $this->reportService = $reportService;
    }

    public function all()
    {
        $data = $this->reportService->all();
        return $this->success('', $data);
    }

    public function find()
    {
        $this->validateId();
        $data = $this->reportService->find($this->modelId);
        return $this->success(__('app::report.found'), $data);
    }

    public function create(ReportRequest $request)
    {
        $attributes = $request->validated();
        $data = $this->reportService->create($attributes);
        return $this->success(__('app::report.created'), $data);
    }

    public function update(ReportRequest $request)
    {
        $this->validateId();
        $attributes = $request->validated();
        $data = $this->reportService->update($this->modelId, $attributes);
        return $this->success(__('app::report.updated'), $data);
    }

    public function delete()
    {
        $this->validateId();
        $this->reportService->delete($this->modelId);
        return $this->success(__('app::report.deleted'));
    }
}
