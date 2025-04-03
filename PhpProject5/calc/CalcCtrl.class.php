<?php
require_once $conf->root_path . '/lib/smarty/Smarty.class.php';
require_once $conf->root_path . '/lib/Messages.class.php';
require_once $conf->root_path . '/app/calc/CalcForm.class.php';
require_once $conf->root_path . '/app/calc/CalcResult.class.php';

class CalcCtrl {
    private $msgs;   // Wiadomości dla widoku
    private $form;   // Dane formularza
    private $result; // Wynik obliczeń

    public function __construct() {
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    public function getParams() {
        $this->form->x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
        $this->form->y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
        $this->form->op = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
    }

    public function validate() {
        if (!(isset($this->form->x) && isset($this->form->y) && isset($this->form->op))) {
            return false; // Jeśli brak parametrów, zwróć false
        }

        if ($this->form->x == "") {
            $this->msgs->addError('Nie podano kwoty kredytu.');
        }
        if ($this->form->y == "") {
            $this->msgs->addError('Nie podano oprocentowania.');
        }
        if ($this->form->op == "") {
            $this->msgs->addError('Nie wybrano okresu kredytowania.');
        }

        if (!$this->msgs->isError()) {
            if (!is_numeric($this->form->x) || !is_numeric($this->form->y)) {
                $this->msgs->addError('Kwota kredytu i oprocentowanie muszą być liczbami.');
            }
        }

        return !$this->msgs->isError();
    }

    public function process() {
        $this->getParams();

        if ($this->validate()) {
            $this->form->x = floatval($this->form->x);
            $this->form->y = floatval($this->form->y);
            $this->msgs->addInfo('Parametry poprawne.');

            $terms = ['1 rok' => 12, '2 lata' => 24, '3 lata' => 36, '5 lat' => 60];
            if (!isset($terms[$this->form->op])) {
                $this->msgs->addError('Niepoprawny okres kredytowania.');
            } else {
                $P = $this->form->x;            // Kwota kredytu
                $r = $this->form->y / (12 * 100); // Miesięczna stopa procentowa
                $n = $terms[$this->form->op];    // Liczba miesięcy

                if ($r > 0) {
                    $this->result->result = ($P * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
                } else {
                    $this->result->result = $P / $n;
                }
                $this->msgs->addInfo('Wykonano obliczenia.');
            }
        }

        $this->generateView();
    }

    public function generateView() {
        global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf', $conf);
        $smarty->assign('page_title', 'Kalkulator Kredytowy');
        $smarty->assign('msgs', $this->msgs);
        $smarty->assign('form', $this->form);
        $smarty->assign('res', $this->result);

        $smarty->display($conf->root_path . '/app/calc/CalcView.html');
    }
}
?>