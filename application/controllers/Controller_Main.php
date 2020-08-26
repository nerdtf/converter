<?php


class Controller_Main extends Controller
{
	public function __construct(){
        parent::__construct();
        $this->model = new Model_Main();        
    }



    public function action_index(){

    	$data = [];
        $data['currencies'] = $this->model->getCurrencies();

        $this->view->generate('homepage.php','main_template.php', $data);
    }

    public function action_history(){  	

    	$data = [];
        $data['history'] = $this->model->getHistory();

        $this->view->generate('history.php','main_template.php', $data);
    }

    public function action_settings(){  	

    	$data = [];
        $data['currencies'] = $this->model->getCurrencies();

        $this->view->generate('settings.php','main_template.php', $data);
    }

    public function action_store(){
    	$i = 0;
    	$all_curr = $this->model->getCurrencies();

    	foreach ($_POST as $key => $curr) {
    		$visible[$i] = $this->model->get_from_post($key); 
    		$i++;
       	}
       	for ($j=0; $j < count($visible) ; $j++) {
       		foreach ($all_curr as $key => $curr) { 
       			if($curr['id'] == $visible[$j]['id'] ){
       					$this->model->change_visability($curr['currency_name'], 1);
       					
       					unset($all_curr[$key]);
       			}
       			else {
       				$this->model->change_visability($curr['currency_name'], 0);
       				
       			}
       		}
       	}

       	$data = [];
        $data['currencies'] = $this->model->getCurrencies();

        $this->view->generate('settings.php','main_template.php', $data);

    }  	
    public function action_currency(){

    	$data = [];
        $data['currencies'] = $this->model->getCurrencies();

    	if(isset($_POST['value']) && isset($_POST['from_currency']) && isset($_POST['to_currency']) ){
    		$apikey = '2abbbda058560e2c9a86';
	    	$from_Currency = urlencode($_POST['from_currency']);
	  		$to_Currency = urlencode($_POST['to_currency']);
	  		$query =  "{$from_Currency}_{$to_Currency}";
	  		$json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
	  		$obj = json_decode($json, true);
	  		$val = floatval($obj["$query"]);
	  		$total = $val * $_POST['value'];
	  		$final_curr = number_format($total, 2, '.', '');
	  		$_POST['final_curr'] = $final_curr;
	  		$this->model->saveExchange($_POST['value'] , $from_Currency, $to_Currency, $final_curr);    		
    	}
        $this->view->generate('homepage.php', 'main_template.php', $data);
    }

}