<?php


namespace Core\Service\Transacao;

use Core\Entity\Transacao\Cartao;
use Doctrine\ORM\EntityManager;


class CartaoService
{
    public $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create($data, $usr, $cartao = null)
    {
        if (!$cartao) {
            $cartao = new Cartao();
        }
        $cartao->cpf = $data['cpf'];
        $cartao->nome = $data['nome'];
        $cartao->sobrenome = $data['sobrenome'];
        $cartao->nrcartao = $data['nrcartao'];
        $cartao->tipo = $data['tipo'];
        $cartao->validade = $data['validade'];
        $cartao->descadd = $data['descadd'];
        $cartao->codpessoa = $data['codpessoa'];
        try{
            $this->em->persist($cartao);
            $this->em->flush();
            return ['codigo' => 201, 'mensagem' => 'Cartao criada com sucesso!'];
        } catch (\Exception $e){
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function fetch($id = null)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p.nrcartao, p.nome, p.sobrenome, p.cpf')
            ->from('Core\Entity\Transacao\Cartao', 'p');
        if($id){
            $qb->where("p.codpessoa = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function update($id, $data, $usr){
        $pessoap = $this->em->getRepository(\Core\Entity\Transacao\Cartao::class)->findOneBy(['cod_cartao' => $id]);
        // \Doctrine\Common\Util\Debug::dump($projeto);
        if($id){
            return $this->create($data, $usr, $pessoap);
        }
        return 'Nenhuma tarefa encontrada!';
    }

    public function delete($id, $usr){
        $cartao = $this->em->getRepository(\Core\Entity\Transacao\Cartao::class)->findOneBy(['cod_cartao' => $id]);
        // $dono = $this->em->getRepository(\Core\Entity\Projeto\Tarefa::class)->findOneBy(['idCriador' => $usuario->id]);
        // if($dono){
        $sql = "delete from cartao where cod_cartao = {$cartao->cod_cartao} returning cod_cartao";
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