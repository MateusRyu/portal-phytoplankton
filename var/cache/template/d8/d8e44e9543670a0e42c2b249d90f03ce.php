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

/* pages/samples/allSamples.html.twig */
class __TwigTemplate_ac88baf95ba4bf09dec1f7de5c7d5d90 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'main' => [$this, 'block_main'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates/registrationForm.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["title"] = twig_capitalize_string_filter($this->env, "Cadastro de ocorrência");
        // line 1
        $this->parent = $this->loadTemplate("templates/registrationForm.html.twig", "pages/samples/allSamples.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<div class=\"pb-2 mb-3 border-bottom\">
  <h1 id=\"registro-de-coletas\" class=\"h2\">Registro de coleta</h1>
</div>
";
        // line 9
        if (($context["alert"] ?? null)) {
            // line 10
            echo "  <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
    ";
            // line 11
            echo twig_escape_filter($this->env, ($context["alert"] ?? null), "html", null, true);
            echo "
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
  </div>
";
        }
        // line 15
        echo "<ul class=\"nav nav-tabs \">
  <li class=\"nav-item mx-1\">
    <a role=\"button\" id=\"tabGeral\" class=\"nav-link\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/editar\">Geral</a>
  </li>
  <li class=\"nav-item mx-1\">
    <a role=\"button\" id=\"tabColetas\" class=\"nav-link active\" href=\"#registro-de-coletas\" aria-current=\"page\">Coletas</a>
  </li>
</ul>

<div id=\"navSection\" class=\"nav nav-tabs pt-2 mb-0 bg-white\">
  <li class=\"nav-item mx-1\">
    <a id=\"nav-col\" class=\"nav-link active\" aria-current=\"page\" href=\"#\" onclick='swapTab(\"col\")'>Todas as coletas salvas</a>
  </li>
  <li class=\"nav-item mx-1\" onclick='swapTab(\"man\")'>
    <a id=\"nav-man\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/amostra/cadastro-manual\" class=\"nav-link\">Novo cadastro (manual)</a>
  </li>
  <li class=\"nav-item mx-1\" onclick='swapTab(\"auto\")'>
    <a id=\"nav-auto\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/amostra/cadastro-automatico\" class=\"nav-link\">Novo cadastro (automatizado)</a>
  </li>
</div>
<div class=\"col pt-2 mt-0 bg-whites\">
  <div id=\"tab-coletas\" class=\"py-2 p-4\">
    <div class=\"alert alert-info\" role=\"alert\">
      Cada coleta corresponde à uma coordenada e/ou momento diferente
    </div>
    <div class=\"album my-2 py-2 bg-light\">
      <div class=\"container\">
        <div class=\"row\">
";
        // line 43
        if (($context["samples"] ?? null)) {
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["samples"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["sample"]) {
                echo "        
          ";
                // line 45
                echo twig_include($this->env, $context, "patterns/sampleCard.html.twig");
                echo "
";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sample'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 48
            echo "          <div class=\"bg-white rounded\">
            <p class=\"\">
              Nenhuma coleta registrada. Clique em \"Novo cadastro (manual)\"  ou 
              \"Novo cadastro (automatizado)\" para cadastrar uma nova coleta.
            </p>
            <p>
              A diferença entre o cadastro manual e o automatizado é que o primeiro
              requer o preenchimento dos campos (tais como localização da coleta e 
              cada taxon encontrado) um à um manualmente, enquanto que no modo automatizado
              apenas requer o envio de um arquivo de planilha já com os dados.
            </p>
          </div>
";
        }
        // line 61
        echo "        </div>
      </div>
    </div>
    <a href=\"";
        // line 64
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/editar\" class=\"btn btn-secondary btn-lg\" type=\"submit\">Cancelar e voltar</a>
    <a href=\"";
        // line 65
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/enviar-para-curadoria\" class=\"btn btn-primary btn-lg\" type=\"submit\">Enviar as coletas salvas para curadoria</a>
  </div>
</div>

";
    }

    // line 71
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 72
        echo "<script src=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/js/swapTabFormSample.js\"></script>
<script src=\"";
        // line 73
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/js/sampleForm.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "pages/samples/allSamples.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 73,  195 => 72,  191 => 71,  180 => 65,  174 => 64,  169 => 61,  154 => 48,  137 => 45,  118 => 44,  116 => 43,  100 => 32,  92 => 29,  75 => 17,  71 => 15,  64 => 11,  61 => 10,  59 => 9,  54 => 6,  50 => 5,  45 => 1,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/samples/allSamples.html.twig", "/shared/httpd/portal/app/views/pages/samples/allSamples.html.twig");
    }
}
