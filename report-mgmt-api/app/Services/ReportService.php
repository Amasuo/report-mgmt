<?php

namespace App\Services;

use App\Interfaces\EloquentServiceInterface;
use App\Repositories\ReportRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ReportService implements EloquentServiceInterface
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function all(): Collection
    {
        return $this->reportRepository->all();
    }

    public function find(int $id): ?Model
    {
        return $this->reportRepository->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->reportRepository->create($attributes);
    }
    public function update(int $id, array $attributes): Model
    {
        return $this->reportRepository->update($id, $attributes);
    }
    public function delete(int $id): bool
    {
        return $this->reportRepository->delete($id);
    }
}
