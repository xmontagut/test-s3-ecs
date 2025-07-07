<?php


require './vendor/autoload.php';
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;


echo("\n");
echo("--------------------------------------\n");
print("Welcome to the Amazon S3 getting started demo using PHP!\n");
echo("--------------------------------------\n");

$region = 'us-east-1';
$S3_VERSION = '2006-03-01';


$opts = getOpt('e:', array('endpoint:')); 

if ( $opts['e'] ) {
	$endpoint = $opts['e'];
} else {
	fwrite(STDERR, "Vous devez donner en argument le point de terminaison S3.\n");
	exit(1);
}


//$credentials = Aws\Credentials\CredentialProvider::sso('profile default');
$credentials = CredentialProvider::env();
// $credentials = new Credentials(getenv('AWS_ACCESS_KEY_ID'), getenv('AWS_SECRET_ACCESS_KEY'));

$s3client = new S3Client(array(
    'version' => $S3_VERSION,
    'region' => $region,
    'endpoint' => $endpoint,
    'credentials' => $credentials,
    'use_aws_shared_config_files' => false,
    'use_path_style_endpoint' => true,
    'debug' => true,
));


$results = $s3client->listBuckets();
var_dump($results);


echo "Successfully ran the Amazon S3 with PHP demo.\n";
