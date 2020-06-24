<?php


namespace Core\Service\Galeria;

use Core\Entity\Galeria\Obras;
use Doctrine\ORM\EntityManager;


class ObrasService
{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }


    public function create($data, $usr, $obras = null)
    {
        if (!$obras) {
            $obras = new Obras();
            $obras->likes = 0;
        }

        $usuario = $this->em->getRepository(\Core\Entity\Pessoa\Pessoa::class)->findOneBy(['codpessoa' => $usr['user_id']]);
        $codpessoa = $usuario->codpessoa;
        $nomep = $usuario->nomep;
        $obras->img = $data['img'];
        $obras->iduser = $codpessoa;
        $obras->nome = $data['nome'];
        $obras->artista = $nomep;
        $obras->descricao = $data['descricao'];
        $obras->likes = $obras->likes + $data['likes'];


        try {
            $this->em->persist($obras);
            $this->em->flush();
            return ['codigo' => 201, 'mensagem' => 'Obra postada'];
        } catch (\Exception $e) {
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function fetch($id=null){
        $qb = $this->em->createQueryBuilder()
            ->select('p.img, p.id, p.nome, p.artista, p.descricao, p.likes, p.iduser')
            ->from('Core\Entity\Galeria\Obras','p');
        if($id){
            $qb->where("p.id = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public  function update($id, $data, $usr){
        $obras = $this->em->getRepository(\Core\Entity\Galeria\Obras::class)->findOneBy(['id' => $id]);
        $obras->likes = $obras->likes + $data['likes'];
        try{
            $this->em->persist($obras);
            $this->em->flush();
            return ['codigo' => 201,'mensagem'=>'Mensagem enviada'];
        } catch (\Exception $e){
            var_dump($e->getCode());
            var_dump($e->getMessage());
            exit;
        }
    }

    public function delete($id){
        $sql = "delete from obras where id = {$id} returning id";
        $stmt = $this->em->getConnection()->prepare($sql);
        try {
            $stmt->execute();
            $retorno = $stmt->fetchAll();
            if(!isset($retorno[0])){
                return ['codigo' => 404, 'mensagem' => 'Não foi possível excluir a Obra, verique se você é o Dono!'];
            }
        } catch (\Exception $e){
            return ['codigo' => 500, 'mensagem' => 'Não foi possível excluir a Obra!'];
        }
        return ['codigo' => 200, 'mensagem' => 'Excluído com sucesso!'];
    }
}