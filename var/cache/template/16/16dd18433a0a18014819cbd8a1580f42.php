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

/* pages/samples/formAutomaticInsert.html.twig */
class __TwigTemplate_cabc03301edfbb70684dd5659b189c1e extends Template
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
        $this->parent = $this->loadTemplate("templates/registrationForm.html.twig", "pages/samples/formAutomaticInsert.html.twig", 1);
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
    <a id=\"nav-col\" class=\"nav-link\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/amostras\">Todas as coletas salvas</a>
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
    <a id=\"nav-auto\" href=\"#\" class=\"nav-link active\" aria-current=\"page\">Novo cadastro (automatizado)</a>
  </li>
</div>
<div class=\"col pt-2 mt-0 bg-whites\">
  <div id=\"tab-auto\" class=\"row py-2 bg-white p-4\">
";
        // line 37
        $context["maxSize"] = 300;
        // line 38
        echo "    <form action=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/adicionar-amostra/auto\" method=\"post\" enctype=\"multipart/form-data\">
      <h4 class=\"mb-3\">Cadastro automatizado</h4>
      <p>
        Para o cadastro autamatizado, apenas enviando o arquivo com os dados, 
        será necessário seguir o seguinte modelo de arquivo:
        
      </p>
      <div class=\"input-group mb-3\">
        <label class=\"input-group-text\" for=\"fotoLocal\">Selecione o arquivo com os dados: </label>
        <input type=\"file\" class=\"form-control\" id=\"file\" name=\"file\" accept=\"text/plain, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel\"  onchange=\"validateSize(this, ";
        // line 47
        echo twig_escape_filter($this->env, ($context["maxSize"] ?? null), "html", null, true);
        echo ")\">
      </div>
      <span class=\"text-muted\">* tamanho maximo de ";
        // line 49
        echo twig_escape_filter($this->env, ($context["maxSize"] ?? null), "html", null, true);
        echo "MB</span>
      <hr>
      <button class=\"btn btn-primary btn-lg\" type=\"submit\">Enviar</button>
    </form>
  </div>
</div>

";
    }

    // line 58
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 59
        echo "<script src=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/js/sampleForm.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "pages/samples/formAutomaticInsert.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 59,  144 => 58,  132 => 49,  127 => 47,  112 => 38,  110 => 37,  97 => 29,  89 => 26,  75 => 17,  71 => 15,  64 => 11,  61 => 10,  59 => 9,  54 => 6,  50 => 5,  45 => 1,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/samples/formAutomaticInsert.html.twig", "/shared/httpd/portal/app/views/pages/samples/formAutomaticInsert.html.twig");
    }
}
