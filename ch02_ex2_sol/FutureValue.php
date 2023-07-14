<!--Greg Rodriguez-->
<!--Lab Assignment 14-1B-->
<?php 
    class FutureValue {
        public $investment;
        public $interest_rate;
        public $years;

        public function setInvestment($investment) {
            $this->investment = $investment;
        }

        public function setInterestRate($interest_rate) {
            $this->interest_rate = $interest_rate;
        }
    
        public function setYears($years) {
            $this->years = $years;
        }

        public function validateValues() {
            if ($this->investment === FALSE ) {
                return 'Investment must be a valid number.<br>'; 
            } else if ($this->investment <= 0 ) {
                return 'Investment must be greater than zero.<br>'; 
            }
            
            if ($this->interest_rate === FALSE )  {
                return 'Interest rate must be a valid number.<br>'; 
            } else if ($this->interest_rate <= 0 ) {
                return 'Interest rate must be greater than zero.<br>'; 
            } else if ($this->interest_rate > 15 ) {
                return 'Interest rate must be less than or equal to 15.<br>';
            }
            
            if ($this->years === FALSE ) {
                return 'Years must be a valid whole number.<br>';
            } else if ($this->years <= 0 ) {
                return 'Years must be greater than zero.<br>';
            } else if ($this->years > 30 ) {
                return 'Years must be less than 31.<br>';
            } 
            return ''; 
        }

        public function calculateFutureValue() {
            $future_value = $this->investment;

            for ($i = 1; $i <= $this->years; $i++) {
                $future_value += $future_value * ($this->interest_rate / 100);
            }
            return $future_value;
        }

        public function formatCurrency($num) {
            return '$'.number_format($num, 2);
        }

        public function formatPercent($num) {
            return $num.'%';
        }
    }
?>