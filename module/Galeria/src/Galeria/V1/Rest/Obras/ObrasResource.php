<?php
namespace Galeria\V1\Rest\Obras;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Core\Service\Galeria\ObrasService as obras;

class ObrasResource extends AbstractResourceListener
{
    protected $em;
    protected $sm;
    protected $db;
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */

    public function __construct($services){
        $this->sm = $services;
        $this->em = $services->get('Doctrine\ORM\EntityManager');
        //$this->db = $service->get('oauth2');
    }

    public function create($data)
    {
        $data = $this->getInputFilter()->getValues();
        $usr = $this->getEvent()->getIdentity()->getAuthenticationIdentity();
        $obras = new obras($this->em);
        $retorno = $obras->create($data, $usr);

        return new ApiProblem($retorno['codigo'], $retorno['mensagem']);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $obras = new obras($this->em);
        $retorno = $obras->delete($id);
        return new ApiProblem($retorno['codigo'], $retorno['mensagem']);
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $obras = new obras($this->em);
        return $obras->fetch(ltrim($id, '='));
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $obras = new obras($this->em);
        return $obras->fetch();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $usr = $this->getEvent()->getIdentity()->getAuthenticationIdentity();
        $data = $this->getInputFilter()->getValues();
        $obras = new obras($this->em);
        $obras->update($id, $data, $usr);
    }
}
