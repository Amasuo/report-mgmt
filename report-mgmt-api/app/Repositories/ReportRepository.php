<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository extends BaseRepository
{
    public function __construct(Report $report)
    {
        parent::__construct($report);
    }
}
