<?
class Form {
  private $method;
  private $action;
  private $fields;
  private $buttons;
  private $options;

  function __construct ($method, $action, $fields, $buttons, $options) {
    $this->method = $method;
    $this->action = $action;
    $this->fields = $fields;
    $this->buttons = $buttons;
    $this->options = $options;
  }

  function render() {    
    $fields = array_map(function ($field) {
      $field_html = '<input ';
      foreach ($field as $key => $value) {
        $field_html .= "$key='$value' ";
      }
      $field_html .= ' >';      
      return $field_html;
    }, $this->fields);
    
    if ( isset($this->options['split_lines']) ) {
      $fields = join($fields, '<br>') . "<br>"; 
    } else {
      $fields = join($fields, '') . "<br>";
    }      
        
    $buttons = array_map(function ($button) {
      $button_html = '<button ';
      foreach ($button as $key => $value) {
        $button_html .= "$key='$value' ";
      }
      $button_html = $button_html . ">" . $button['text'] . "</button>";
      return $button_html;
    }, $this->buttons);
    $buttons = join($buttons, '');

    $html = "
      <form method='$this->method' action='$this->action'>
        $fields 
        $buttons      
      </form>
    ";
    return $html;
  }

  function print () {
    echo $this->render();
  }
}

class FormBuilder {
  private $properties = [
    'method' => 'GET',
    'action' => '/',
    'fields' => [],
    'buttons' => [],
    'options' => []
  ];

  static function build () {
    return new self();
  }

  function set_method ($method) {
    $this->properties['method'] = $method;
    return $this;
  }

  function set_action ($action) {
    $this->properties['action'] = $action;
    return $this;
  }

  function add_field ($field) {
    array_push($this->properties['fields'], $field);
    return $this;
  }

  function add_button ($field) {
    array_push($this->properties['buttons'], $field);
    return $this;
  }

  function set_options ($options) {    
    array_walk ($options, function ($value, $key) {
      $this->properties['options'][$key] = $value;
    } );
    return $this;
  }

  function done () {
    $props = $this->properties;    
    return new Form($props['method'], $props['action'], $props['fields'], $props['buttons'], $props['options'] );
  }
}
?>