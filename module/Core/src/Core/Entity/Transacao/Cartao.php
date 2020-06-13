<?php


namespace Core\Entity\Transacao;

use Doctrine\ORM\Mapping as ORM;
/**
 * cartao
 *
 * @ORM\Table(name="cartao")
 * @ORM\Entity
 */
class Cartao
{
    /**
     * @var string
     *
     * @ORM\Column(name="nrcartao", type="string", nullable=false)
     */
    public $nrcartao;
    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", nullable=false)
     */
    public $tipo;
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", nullable=false)
     */
    public $nome;
    /**
     * @var integer
     *
     * @ORM\Column(name="codpessoa", type="integer", nullable=false)
     */
    public $codpessoa;
    /**
     * @var string
     *
     * @ORM\Column(name="validade", type="string", nullable=false)
     */
    public $validade;
    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", nullable=false)
     */
    public $cpf;
    /**
     * @var string
     *
     * @ORM\Column(name="descadd", type="string", nullable=false)
     */
    public $descadd;
    /**
     * @var integer
     *
     * @ORM\Column(name="cod_cartao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cartao_cod_cartao_seq", allocationSize=1, initialValue=1)
     */
    public $cod_cartao;
    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome", type="string", nullable=false)
     */
    public $sobrenome;

}