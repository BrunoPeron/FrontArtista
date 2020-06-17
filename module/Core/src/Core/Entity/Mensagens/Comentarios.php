<?php


namespace Core\Entity\Mensagens;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentarios
 *
 * @ORM\Table(name="comentarios")
 * @ORM\Entity
 */
class Comentarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="comentarios_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;
    /**
     * @var integer
     *
     * @ORM\Column(name="obraid", type="integer", nullable=false)
     */
    public $obraid;
    /**
     * @var string
     *
     * @ORM\Column(name="obra", type="string", nullable=false)
     */
    public $obra;
    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    public $userid;
    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", nullable=false)
     */
    public $user;
    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="string", nullable=false)
     */
    public $mensagem;


}