<?php

namespace App\Services;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\HomeDesignContact;
use App\Models\Subscribe;

class ReportService
{
    public function getReportData()
    {
        $settings = Contact::orderBy('id', 'desc');
        if (request('from_date')) {
            $dateInput = request('from_date');
            $explode = explode('to', $dateInput);
            $fromDate = $explode[0];
            if (isset($explode[1])) {
                $toDate = $explode[1];
            }
        }
        if (request('from_date')) {
            if (isset($toDate)) {
                $settings = $settings->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate);
            } else {
                $settings = $settings->whereDate('created_at', '>=', $fromDate);
            }
        }
        return $settings;
    }

    public function getReportEnquiryData()
    {
        $settings = Enquiry::orderBy('id', 'desc');
        if (request('from_date')) {
            $dateInput = request('from_date');
            $explode = explode('to', $dateInput);
            $fromDate = $explode[0];
            if (isset($explode[1])) {
                $toDate = $explode[1];
            }
        }
        if (request('from_date')) {
            if (isset($toDate)) {
                $settings = $settings->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate);
            } else {
                $settings = $settings->whereDate('created_at', '>=', $fromDate);
            }
        }
        return $settings;
    }

    public function getReportSubscribeData()
    {
        $settings = Subscribe::orderBy('id', 'desc');
        if (request('from_date')) {
            $dateInput = request('from_date');
            $explode = explode('to', $dateInput);
            $fromDate = $explode[0];
            if (isset($explode[1])) {
                $toDate = $explode[1];
            }
        }
        if (request('from_date')) {
            if (isset($toDate)) {
                $settings = $settings->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate);
            } else {
                $settings = $settings->whereDate('created_at', '>=', $fromDate);
            }
        }
        return $settings;
    }

    public function getReportDesignContactData()
    {
        $settings = HomeDesignContact::orderBy('id', 'desc');
        if (request('from_date')) {
            $dateInput = request('from_date');
            $explode = explode('to', $dateInput);
            $fromDate = $explode[0];
            if (isset($explode[1])) {
                $toDate = $explode[1];
            }
        }
        if (request('from_date')) {
            if (isset($toDate)) {
                $settings = $settings->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate);
            } else {
                $settings = $settings->whereDate('created_at', '>=', $fromDate);
            }
        }
        return $settings;
    }


}

