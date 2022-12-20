<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* pages/terms/UserResponsibility-2022.html.twig */
class __TwigTemplate_43ba6c206f2b835fd9d04e3d1f22ece2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["fullPage"] ?? null)) {
            // line 2
            echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
    <head>
        <title>
            Termos de Responsabilidades - ";
            // line 6
            echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
            echo "
        </title>
        <style>
            body {
                text-align: justify;
                padding-right: 120px;
                padding-left: 80px;
            }

            h1 {
                text-align: center;
            }

            li {
                margin-bottom: 1em;
            }
        </style>
    </head>
    <body>
";
        }
        // line 26
        echo "        <h1 id=\"responsabilidades-do-usuario\">Termo de Responsabilidades</h1>
        <p>Data da última atualização: Outubro de 2022.</p>
        <p>
            A plataforma \"";
        // line 29
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "\" é uma 
            plataforma de agregação, indexação e compartilhamento
            de informação. Entende-se que o Termo de Responsabilidade
            é um documento que descreve e estabelece os termos e condições 
            para uso dos serviços da plataforma. Para os fins destes Termos 
            de Responsabilidades, \"plataforma\" ou \"portal\" remetem a plataforma 
            \"";
        // line 35
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "\" e seus serviços. Ao aceitar estes termos 
            o usuário está ciente de que estes termos podem sofrer 
            modificações e atualizações com a finalidade de 
            melhorar o relacionamento dos usuários com a plataforma, 
            sendo assim, é de responsabilidade do usuário se atentar 
            e se adequar à possíveis alterações deste Termo.
        </p>
        <p>
            Os serviços deste ambiente são disponibilizados mediante 
            os termos e condições abaixo descritos:
        </p>
        <ol style=\"list-style: inside;\">
            
            <li>
                Caso o usuário não siga as regras estabelecidas, a plataforma 
                se reserva o direito de cancelar o acesso do usuário ao ambiente,
                bem como a exclução ou alteração dos dados deste usuário.
            </li>
            <li>
                Com a aceitação do presente termo, o usuário compromete-se 
                a utilizar os serviços ora disponibilizados pela plataforma 
                apenas para fins legais, sujeitando-se à legislação aplicável 
                a espécie, assim como a todos os regulamentos pertinentes à 
                matéria.
            </li>
            <li>
                A privacidade da informação dos usuários da plataforma é 
                muito importante para portal, que toma precauções e cautelas 
                para resguardar toda a informação que é fornecida, utilizando 
                mecanismos de segurança em informática modernos e eficazes 
                e se comprometendo a tomar todas as medidas razoáveis ao seu 
                alcance no sentido de proteger a privacidade da informação. 
                Sendo assim, o usuário se responsabiliza em resguardar sua senha
                e outros dados sensivéis, como o endereço de e-mail. O 
                compartilhamento, acidentalmente ou intencionalmente, 
                de qualquer dado por parte do usuário e as consequências diretas 
                da mesma serão atribuídos unicamente e exclusivamente ao usuário.
            </li>
            <li>
                Não é permitida a modificação, cópia, distribuição, transmissão, 
                reprodução, publicação, criação de trabalhos derivados do site, 
                venda de quaisquer informações, material, software, produto ou 
                serviço deste site, bem como sua utilização com propósitos 
                imorais, ilegais, obsceno, de caráter difamatório, que venham 
                desrespeitar marcas registradas ou material protegido por direitos 
                autorais e fora dos termos constantes ou qualquer outro que viole 
                a legislação vigente no país.
            </li>
            <li>
                Não é permitida a utilização deste site para transmitir ou divulgar 
                ameaças ou mensagens tipo \"corrente\", receber ou enviar material ilegal.
            </li>
            <li>
                Não é permitido o envio de grande quantidade de requisições para cadastro,
                modificação ou exclução com conteúdos fora do escopo ou repetitivos para 
                a plataforma.
            </li>
            <li>
                A plataforma compromete-se a não editar ou compartilhar os dados sensivéis 
                de seus usuários, tais como endereços de e-mail ou senhas exceto nos casos 
                que impliquem:
                <ul>
                    <li>
                        obediência à determinação legal;
                    </li>
                    <li>
                        a defesa e a proteção dos direitos ou propriedades do Site;
                    </li>
                    <li>
                        o interesse de zelar pela segurança pessoal de seus usuários 
                        ou do público em geral.
                    </li>
                </ul>
            </li>
            <li>
                A plataforma considera essencial o compromisso com a proteção da 
                privacidade de seus usuários. Neste sentido, não comercializa, troca 
                ou disponibiliza a terceiros, informações sensivéis sobre os usuários.
            </li>
            <li>
                A plataforma reserva-se do direito de coletar a qualquer tempo determinadas 
                informações relativas ao uso, quantidade e frequência das visitas a plataforma.
            </li>
        </ol>
";
        // line 119
        if (($context["fullPage"] ?? null)) {
            // line 120
            echo "    </body>
</html>
";
        }
    }

    public function getTemplateName()
    {
        return "pages/terms/UserResponsibility-2022.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 120,  169 => 119,  82 => 35,  73 => 29,  68 => 26,  45 => 6,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/terms/UserResponsibility-2022.html.twig", "/shared/httpd/portal/app/views/pages/terms/UserResponsibility-2022.html.twig");
    }
}
