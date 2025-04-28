<?php
namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {
    private $form;
    private $result;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    public function getParams() {
        $this->form->amount = getFromRequest('amount');
        $this->form->rate = getFromRequest('rate');
        $this->form->years = getFromRequest('years');
    }

    public function validate() {
        if (!(isset($this->form->amount) && isset($this->form->rate) && isset($this->form->years))) {
            return false;
        }

        if ($this->form->amount == "") {
            getMessages()->addError('Nie podano kwoty kredytu');
        }
        if ($this->form->rate == "") {
            getMessages()->addError('Nie podano oprocentowania');
        }
        if ($this->form->years == "") {
            getMessages()->addError('Nie wybrano okresu spłaty');
        }

        if (!getMessages()->isError()) {
            if (!is_numeric($this->form->amount) || $this->form->amount <= 0) {
                getMessages()->addError('Kwota kredytu musi być dodatnią liczbą');
            }
            if (!is_numeric($this->form->rate) || $this->form->rate < 0 || $this->form->rate > 100) {
                getMessages()->addError('Oprocentowanie musi być liczbą od 0 do 100');
            }
            if (!in_array($this->form->years, [1, 2, 3, 5, 10])) {
                getMessages()->addError('Okres spłaty musi być jednym z: 1, 2, 3, 5, 10 lat');
            }
        }

        return !getMessages()->isError();
    }

    public function action_calcCompute() {
        $this->getParams();

        if ($this->validate()) {
            $this->form->amount = floatval($this->form->amount);
            $this->form->rate = floatval($this->form->rate);
            $this->form->years = floatval($this->form->years);
            getMessages()->addInfo('Parametry poprawne.');

            $monthly_rate = $this->form->rate / 100 / 12;
            $months = $this->form->years * 12;
            if ($monthly_rate > 0) {
                $this->result->monthly_payment = ($this->form->amount * $monthly_rate) / 
                    (1 - pow(1 + $monthly_rate, -$months));
            } else {
                $this->result->monthly_payment = $this->form->amount / $months;
            }
            $this->result->monthly_payment = round($this->result->monthly_payment, 2);

            getMessages()->addInfo('Obliczono miesięczną ratę.');
        }

        $this->generateView();
    }

    public function action_calcShow() {
        getMessages()->addInfo('Witaj w kalkulatorze kredytowym');
        $this->generateView();
    }

    public function generateView() {
        getSmarty()->assign('page_title', 'Kalkulator Kredytowy');
        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('res', $this->result);
        getSmarty()->display('CalcView.tpl');
    }
}