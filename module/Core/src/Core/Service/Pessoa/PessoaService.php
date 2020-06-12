<?php


namespace Core\Service\Pessoa;

use Core\Entity\Pessoa\Pessoa;
use Doctrine\ORM\EntityManager;

class PessoaService
{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $pessoa=null){
        if(!$pessoa){
            $pessoa = new Pessoa();
        }
        $pessoa->nomep = $data['nomep'];
        $pessoa->idade = $data['idade'];
        $pessoa->sobrenome = $data['sobrenome'];
        $pessoa->sexo = $data['sexo'];
        $pessoa->profissao = $data['profissao'];
        $pessoa->cpf = $data['cpf'];
        $pessoa->descricao = $data['descricao'];
        $pessoa->pais = $data['pais'];
        $pessoa->estado = $data['estado'];
        $pessoa->cidade = $data['cidade'];
        $pessoa->bairro = $data['bairro'];
        $pessoa->rua = $data['rua'];
        $pessoa->complemento = $data['complemento'];
        $pessoa->cep = $data['cep'];
        $pessoa->infadd = $data['infadd'];
        $data_nasc = \DateTime::createFromFormat("d/m/Y", $data['datanasc']);
        $pessoa->datanasc = $data_nasc;
        try{
            $this->em->persist($pessoa);
            $this->em->flush();
            return ['codigo' => 201, 'mensagem' => 'Pessoa criada com sucesso!'];
        } catch (\Exception $e){
            // var_dump($e->getCode());
            var_dump($e->getMessage());
            return ['codigo' => 500, 'mensagem' => 'Não foi possível criar uma pessoa!'];
        }
    }

    public function fetch($id = null)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p.nomep, p.sobrenome, p.cpf, p.idade, p.datanasc, p.sexo')
            ->from('Core\Entity\Pessoa\Pessoa', 'p');
        if($id){
            $qb->where("p.codpessoa = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function update($id, $data, $usr){
        $pessoap = $this->em->getRepository(\Core\Entity\Pessoa\Pessoa::class)->findOneBy(['codpessoa' => $id]);
        // \Doctrine\Common\Util\Debug::dump($projeto);
        if($id){
            return $this->create($data, $usr, $pessoap);
        }
        return 'Nenhuma tarefa encontrada!';
    }

    public function delete($id, $usr){
        $pessoa = $this->em->getRepository(\Core\Entity\Pessoa\Pessoa::class)->findOneBy(['codpessoa' => $id]);
        // $dono = $this->em->getRepository(\Core\Entity\Projeto\Tarefa::class)->findOneBy(['idCriador' => $usuario->id]);
        // if($dono){
        $sql = "delete from pessoap where codpessoa = {$pessoa->codpessoa} returning codpessoa";
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