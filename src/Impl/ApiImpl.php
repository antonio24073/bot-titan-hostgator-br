<?php
namespace Bot\Titan\Impl;

use Bot\Titan\Node\Crid;
use Bot\Titan\Request\LogoutRequest;
use Bot\Titan\Request\MailSessionInfoPostRequest;
use Bot\Titan\Request\SendPostRequest;
use Bot\Titan\Request\UpsertPostRequest;
use Bot\Titan\Model\File;
use Bot\Titan\Request\FilesPostRequest;
use Bot\Titan\Request\FilesPutRequest;

class ApiImpl
{

    static public function send($data)
    {
        $email = $data->login->email;
        $password = $data->login->password;

        $request = new MailSessionInfoPostRequest($email, $password);
        $filter = $request->filterBy();
        $base_url = $filter->base_url();
        $session = $filter->session();
        $ctid = strval($filter->latest_txn_id());
        echo "Logando".PHP_EOL;
        var_dump($filter->getObject());

        foreach ($data->send as $send) {

            $crid = Crid::get();
            
            $request = new UpsertPostRequest($base_url, $session, $ctid, $crid);
            $filter = $request->filterBy();
            $draft_mid = $filter->draft_mid();
            $req_id = $filter->req_id();
            $thread_id = $filter->thread_id();
            echo "Capturando informações de novo email".PHP_EOL;
            var_dump($filter->getObject());

            foreach ($send->files as &$file_url) {
                $file = new File($file_url);

                $request = new FilesPostRequest($base_url, $session, $draft_mid, $file);
                $filter = $request->filterBy();
                $file->setId($filter->id()); 
                $file->setPut_url($filter->put_url());
                echo "Inserindo informações de arquivo".PHP_EOL;
                var_dump($filter->getObject());

                $request = new FilesPutRequest($file);
                echo "Inserindo arquivo".PHP_EOL;
                var_dump($request->getContents());
                
                $file_url = $file->getId(); // replace url with the id
            }
            

            $crid = Crid::get();

            $request = new SendPostRequest($base_url, $session, $draft_mid, $ctid, $crid, $thread_id, null, null, $send);
            echo "Enviando".PHP_EOL;
            var_dump($request->getContents());
        }
        
        $request = new LogoutRequest($base_url, $session);
        echo "Deslogando (retorna vazio)".PHP_EOL;
        var_dump($request->getContents());
        
        array_map('unlink', array_filter((array) glob($config->temp_folder.DIRECTORY_SEPARATOR.'*')));
        echo "Apagango pasta temp".PHP_EOL;
        
    }
}

