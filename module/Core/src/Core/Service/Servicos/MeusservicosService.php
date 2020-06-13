<?php

namespace Core\Service\Servicos;

use Core\Entity\Servicos\meusservicos;
use Doctrine\ORM\EntityManager;

class MeusservicosService{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $meusservicos = null){
        if(!$meusservicos){
            $meusservicos = new meusservicos();
            $data = date('d/m/Y');
            $meusservicos->dataInicio = \DateTime::createFromFormat("d/m/Y",$data);
            $meusservicos->cliente = $data['cliente'];
            $meusservicos->artista = $data['artista'];
        }

        if(!$meusservicos->nome){
            $meusservicos->nome = $data['nome'];
        }
        if(!$meusservicos->descricao){
            $meusservicos->descricao = $data['descricao'];
        }
        $meusservicos->status = $data['status'];

        if($meusservicos->status==4){
            $data = date('d/m/Y');
            $meusservicos->dataFim = \DateTime::createFromFormat("d/m/Y",$data);
        }

        try{
            $this->em->persist($meusservicos);
            $this->em->flush();
            return ['codigo' => 201,'mensagem'=>'servico criado'];
        } catch (\Exception $e){
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function fetch($id=null){
        $qb = $this->em->createQueryBuilder()
            ->select('p.nome, p.dataInicio, p.dataFim, p.cliente, p.artista, p.descricao, p.status, p.id')
            ->from('Core\Entity\Servicos\meusservicos','p');
        if($id){
            $qb->where("p.id = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public  function update($id, $data, $usr){
        $meuservicos = $this->em->getRepository(\Core\Entity\Servicos\meusservicos::class)->findOneBy(['id' => $id]);
        if($meuservicos){
            return $this->create($data, $usr, $meuservicos);
        }
    }

    public function delete($id){
        $sql = "delete from meusservicos where id = {$id} returning id";
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