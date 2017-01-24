<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SimpleCRUD extends Controller
{
  /* ---------------------------------------------------------------
   *  Listado
   * --------------------------------------------------------------- */
  public function main(Request $request, Response $response, $args)
  {    
    $data = file_get_contents(dirname(__FILE__).'/../../../public/employees.json');
    $products = json_decode($data, true);
    $post = $request->getParams();
    if (isset($post['email']) && !empty($post['email'])) {
        $products = $this->buscar($products, $post['email'], 'email');
    }
    $this->view->render($response, 'crud/list.twig',[
      'results' => $products
    ]);

    return $response;
  }
  /* ---------------------------------------------------------------
   *  Funcion de busqueda para el listado
   * --------------------------------------------------------------- */
  private function buscar($data, $input, $value)
  {
      $result = array_filter($data, function ($item) use ($input,$value) {
          if (stripos($item[$value], $input) !== false) {
              return true;
          }
          return false;
      });
      return $result;
  }
  /* ---------------------------------------------------------------
   *  Detalle
   * --------------------------------------------------------------- */
  public function view(Request $request, Response $response, $args)
  {
    $id = $args['id'];
    $data = file_get_contents(dirname(__FILE__).'/../../../public/employees.json');
    $products = json_decode($data, true);
    $key = array_search($id, array_column($products, 'id'));
    $post = $products[$key];
    $this->view->render($response, 'crud/view.twig', [
      'post' => $post
    ]);
    return $response;
  }
  /* ---------------------------------------------------------------
   *  Servicio XML
   * --------------------------------------------------------------- */
  public function xml(Request $request, Response $response, $args)
  { 
    $params = $request->getParams(); 
    $min = $params['minimo'];
    $max = $params['maximo'];
    $data = file_get_contents(dirname(__FILE__).'/../../../public/employees.json');
    $products = json_decode($data, true);
    $products = $this->buscarIntervalo($products, $min, $max, 'salary');
    header('Content-type: application/xml');
    $xml = new \SimpleXMLElement("<?xml version=\"1.0\"?><Employees></Employees>");
    $this->array_to_xml($products, $xml);
    echo $xml->asXML();
    die();
  }
  /* ---------------------------------------------------------------
   *  Funcion que convierte un array multidimensional a xml
   * --------------------------------------------------------------- */
  private function array_to_xml($array, &$xml) {
      foreach($array as $key => $value) {
          if(is_array($value)) {  
              if (array_key_exists('id', $value)) {
                $node = $xml->addChild('Employee');
                $this->array_to_xml($value, $node);
              } else {
                $xml->addChild("$key",implode(',',array_column($value, 'skill')));
              }        
          } else {
              $xml->addChild("$key","$value");
          }
      }
  }
  /* ---------------------------------------------------------------
   *  Funcio de busqueda por intervalo para el servicio xml
   * --------------------------------------------------------------- */
  private function buscarIntervalo($data, $input1, $input2, $value)
  {
      $result = array_filter($data, function ($item) use ($input1,$input2,$value) {
          $flagMin = false;
          $flagMax = false;
          $salary = str_replace(array('$',','), array('',''), $item[$value]); 
          $salary = floatval($salary);
          if(!isset($input1) || $salary>=floatval($input1))
          {
            $flagMin = true;
          }   
          if(!isset($input2) || $salary<=floatval($input2))
          {
            $flagMax = true;
          }     
          if ($flagMin && $flagMax) {
              return true;
          }
          return false;
      });
      return $result;
  }
}
