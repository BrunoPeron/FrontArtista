<?php


namespace Core\Service\Transacao;

use Core\Entity\Transacao\Contabancaria;
use Doctrine\ORM\EntityManager;
use mysql_xdevapi\Exception;

class ContabancariaService
{
    public $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create($data, $usr, $contabancaria = null)
    {
        if (!$contabancaria) {
            $contabancaria = new Contabancaria();
        }
        if (is_null($data['cpf']) && !is_null($data['cnpj'])){
            $contabancaria->cpnj = $data['cnpj'];
        } elseif (is_null($data['cnpj']) && !is_null($data['cpf'])){
            $contabancaria->cpf = $data['cpf'];
        } else{
            return ['codigo' => 202, 'mensagem' => 'ERRO deve haver cpf ou cnpj um deles apenas'];
        }
        $contabancaria->codpessoa = $usr['user_id'];
        $contabancaria->banco = $data['banco'];
        $contabancaria->nragencia = $data['nragencia'];
        $contabancaria->tipoconta = $data['tipoconta'];
        $contabancaria->cpf = $data['cpf'];
        $contabancaria->nrconta = $data['nrconta'];
        try{
            $this->em->persist($contabancaria);
            $this->em->flush();
            return ['codigo' => 201, 'mensagem' => 'Cartao criada com sucesso!'];
        } catch (\Exception $e){
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function fetch($id = null, $usr)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p.tipoconta, p.cnpj, p.cpf, p.banco,p.nrconta, p.tipoconta, p.nragencia')
            ->from('Core\Entity\Transacao\Contabancaria', 'p');
        if($id){
            $qb->where("p.cod_conta = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }else{
            $qb->where("p.codpessoa = ?1");
            $qb->setParameters([1 => $usr['user_id']]);
        }

        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function update($id, $data, $usr){
        $pessoap = $this->em->getRepository(\Core\Entity\Transacao\Contabancaria::class)->findOneBy(['cod_conta' => $id]);
        // \Doctrine\Common\Util\Debug::dump($projeto);
        if($id){
            return $this->create($data, $usr, $pessoap);
        }
        return 'Nenhuma tarefa encontrada!';
    }

    public function delete($id, $usr = null){
        $contabancaria = $this->em->getRepository(\Core\Entity\Transacao\Contabancaria::class)->findOneBy(['cod_conta' => $id]);
        $sql = "delete from conta_bancaria where cod_conta = {$contabancaria->cod_conta} returning cod_conta";
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
        // }
        // return ['codigo' => 403, 'mensagem' => 'Você não é o dono da tarefa, deste modo não poderá excluí-la!'];
    }
}