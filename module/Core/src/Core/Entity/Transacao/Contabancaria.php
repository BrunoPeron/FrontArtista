<?php


namespace Core\Entity\Transacao;

use Doctrine\ORM\Mapping as ORM;
/**
 * contabancaria
 *
 * @ORM\Table(name="conta_bancaria")
 * @ORM\Entity
 */
class Contabancaria
{
    /**
     * @var string
     *
     * @ORM\Column(name="nrconta", type="string", nullable=false)
     */
    public $nrconta;
    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", nullable=false)
     */
    public $cpf;
    /**
     * @var string
     *
     * @ORM\Column(name="banco", type="string", nullable=false)
     */
    public $banco;
    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", nullable=false)
     */
    public $cpnj;
    /**
     * @var string
     *
     * @ORM\Column(name="tipoconta", type="string", nullable=false)
     */
    public $tipoconta;
    /**
     * @var string
     *
     * @ORM\Column(name="nragencia", type="string", nullable=false)
     */
    public $nragencia;
    /**
     * @var string
     *
     * @ORM\Column(name="codpessoa", type="string", nullable=false)
     */
    public $codpessoa;
    /**
     * @var integer
     *
     * @ORM\Column(name="cod_conta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="conta_bancaria_cod_conta_seq", allocationSize=1, initialValue=1)
     */
    public $cod_conta;
}