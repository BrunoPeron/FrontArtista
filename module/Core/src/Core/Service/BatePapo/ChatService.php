<?php

namespace Core\Service\BatePapo;

use Core\Entity\BatePapo\Chat;
use Doctrine\ORM\EntityManager;

class ChatService{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }
    public function create($data, $usr, $chat = null){
        if(!$chat){
            $chat = new Chat();
        }

        $chat->idChat = $data['idChat'];
        $chat->src = $data['de']; //emisor
        $chat->dst = $data['para']; //destinatario
        $datadia = date('d/m/Y');
        $chat->dateMensagem = \DateTime::createFromFormat("d/m/Y",$datadia);
        $chat->mensagem = $data['mensagem'];


        try{

            $this->em->persist($chat);
            $this->em->flush();
            return ['codigo' => 201,'mensagem'=>'mensagem enviada'];
        } catch (\Exception $e){
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }

    }

    public function fetch($id=null){
        $qb = $this->em->createQueryBuilder()
            ->select('p.dateMensagem, p.src, p.dst, p.id,p.idChat, p.mensagem')
            ->from('Core\Entity\BatePapo\Chat','p');
        if($id){
            $qb->where("p.id = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function delete($id){
        $sql = "delete from chat where id = {$id} returning id";
        $stmt = $this->em->getConnection()->prepare($sql);
        try {
            $stmt->execute();
            $retorno = $stmt->fetchAll();
            if(!isset($retorno[0])){
                return ['codigo' => 404, 'mensagem' => 'Não foi possível excluir a tarefa, verique se você é o Dono!'];
            }
        } catch (\Exception $e){
            return ['codigo' => 500, 'mensagem' => 'Não foi possível excluir a tarefa!'];
        }
        return ['codigo' => 200, 'mensagem' => 'Excluído com sucesso!'];
    }

}