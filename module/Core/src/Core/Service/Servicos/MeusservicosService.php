<?php

namespace Core\Service\Servicos;

use Core\Entity\Servicos\meusservicos;
use Doctrine\ORM\EntityManager;

class MeusservicosService
{
    public $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create($data, $usr, $meusservicos = null)
    {
        if (! $meusservicos) {
            $meusservicos = new meusservicos();
            $date = date('d/m/Y');
            $meusservicos->dataInicio = \DateTime::createFromFormat("d/m/Y", $date);
            $usuario = $this->em->getRepository(\Core\Entity\Pessoa\Pessoa::class)->findOneBy(['codpessoa' => $usr['user_id']]);
            foreach ($usuario as $key => $value) {
                if ($key == 'codpessoa') {
                    $codpessoa = $value;
                } elseif ($key == 'nomep') {
                    $nomep = $value;
                }
            }
            $usuario2 = $this->em->getRepository(\Core\Entity\Pessoa\Pessoa::class)->findOneBy(['codpessoa' => $data['artistaid']]);
            foreach ($usuario2 as $key => $value) {
                if ($key == 'nomep') {
                    $nomep2 = $value;
                }
            }
            $meusservicos->cliente = $nomep;
            $meusservicos->clienteid = $codpessoa;
            $meusservicos->artista = $nomep2;
            $meusservicos->artistaid = $data['artistaid'];
            $meusservicos->status = 1;
        }

        if (!$meusservicos->nome) {
            $meusservicos->nome = $data['nome'];
        }
        if (!$meusservicos->descricao) {
            $meusservicos->descricao = $data['descricao'];
        }
        if($meusservicos->status!=1){
            $meusservicos->status = $data['status'];
        }

        if ($meusservicos->status == 4) {
            $data = date('d/m/Y');
            $meusservicos->dataFim = \DateTime::createFromFormat("d/m/Y", $data);
            $dono = $this->em->getRepository(\Core\Entity\Pessoa\Pessoa::class)->findOneBy(['codpessoa' => $meusservicos->artistaid]);

            if(!$dono->trabalhosfeitos){
                $dono->trabalhosfeitos = 1;
                $this->em->persist($dono);
                $this->em->flush();
            } else {
                $dono->trabalhosfeitos = $dono->trabalhosfeitos + 1;
                $this->em->persist($dono);
                $this->em->flush();
            }
        }

        try {
            $this->em->persist($meusservicos);
            $this->em->flush();
            return ['codigo' => 201,'mensagem' => 'Servico criado'];
        } catch (\Exception $e) {
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function fetch($id = null)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p.nome, p.dataInicio, p.dataFim, p.cliente, p.artista, p.descricao, p.status, p.id, p.clienteid, p.artistaid')
            ->from('Core\Entity\Servicos\meusservicos', 'p');
        if ($id) {
            $qb->where("p.id = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function update($id, $data, $usr)
    {
        $meuservicos = $this->em->getRepository(\Core\Entity\Servicos\meusservicos::class)->findOneBy(['id' => $id]);
        if ($meuservicos) {
            return $this->create($data, $usr, $meuservicos);
        }
    }

    public function delete($id)
    {
        $sql = "delete from meusservicos where id = {$id} returning id";
        $stmt = $this->em->getConnection()->prepare($sql);
        try {
            $stmt->execute();
            $retorno = $stmt->fetchAll();
            if (! isset($retorno[0])) {
                return ['codigo' => 404, 'mensagem' => 'Não foi possível excluir o Servico, verique se você é o Dono!'];
            }
        } catch (\Exception $e) {
            return ['codigo' => 500, 'mensagem' => 'Não foi possível excluir o Servico!'];
        }
        return ['codigo' => 200, 'mensagem' => 'Excluído com sucesso!'];
    }
}
