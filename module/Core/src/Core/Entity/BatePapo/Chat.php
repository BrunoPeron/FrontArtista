<?php


namespace Core\Entity\BatePapo;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="chat")
 * @ORM\Entity
 */
class Chat
{
    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", nullable=false)
     */
    public $src;
    /**
     * @var string
     *
     * @ORM\Column(name="dst", type="string", nullable=false)
     */
    public $dst;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="chat_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;
    /**
     * @var integer
     *
     * @ORM\Column(name="idChat", type="integer", nullable=false)
     */
    public $idChat;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMensagem", type="datetime", nullable=false)
     */
    public $dateMensagem;
    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="string", nullable=false)
     */
    public $mensagem;
}