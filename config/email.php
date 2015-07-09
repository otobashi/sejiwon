$config['protocol'] = 'sendmail';
$config['mailpath'] = '/home/bin/sendmail';
$config['charset']  = 'utf-8';
$config['wordwrap'] = TRUE;

$this->email->initialize($config);
