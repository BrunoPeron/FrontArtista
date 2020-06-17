<?php

namespace Core\Service\Mensagens;

use Core\Entity\Mensagens\Comentarios;
use Doctrine\ORM\EntityManager;

class ComentariosService
{
    public $em;
    public function __construct(EntityManager $em){
    $this->em = $em;
    }
    public function create($data, $usr, $comentarios = null){
        if(!$comentarios){
            $comentarios = new Comentarios();
        }

        $comentarios->obraid = $data['obraid'];
        $comentarios->obra = $data['obra'];
        $comentarios->userid = $data['userid'];
        $comentarios->user = $data['user'];
        $comentarios->mensagem = $data['mensagem'];


        try{
            $this->em->persist($comentarios);
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
            ->select('p.id, p.obraid, p.obra, p.userid, p.user, p.mensagem')
            ->from('Core\Entity\Mensagens\Comentarios','p');
        if($id){
            $qb->where("p.id = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public  function update($id, $data, $usr){
        $comentarios = $this->em->getRepository(\Core\Entity\Mensagens\Comentarios::class)->findOneBy(['id' => $id]);
        $comentarios->mensagem = $data['mensagem'];
        try{
            $this->em->persist($comentarios);
            $this->em->flush();
            return ['codigo' => 201,'mensagem'=>'mensagem enviada'];
        } catch (\Exception $e){
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function delete($id){
        $sql = "delete from comentarios where id = {$id} returning id";
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