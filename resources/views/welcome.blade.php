<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Marca Laser - API</title>
  </head>
  <body>

    <div class="container-fluid pt-3" data-layout="container">
        <div class="content">
            <div class="card mb-3">
                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(/img/illustrations/corner-4.png);"></div> <!--/.bg-holder-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">ML online</h3>
                            <p class="mt-2">Documentação de API ML Online</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(/img/illustrations/corner-1.png);"></div> <!--/.bg-holder-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <span class="my-1">Autenticação</span>
                                <a class="nav-link active" id="auth-req-tab" data-toggle="pill" href="#auth-req" role="tab" aria-controls="auth-req" aria-selected="true">Requisitos</a>
                                <span class="my-1">Produtos</span>
                                <a class="nav-link" id="prod-list-tab" data-toggle="pill" href="#prod-list" role="tab" aria-controls="prod-list" aria-selected="false">Listar</a>
                                <a class="nav-link" id="prod-consultar-tab" data-toggle="pill" href="#prod-consultar" role="tab" aria-controls="prod-consultar" aria-selected="false">Consultar</a>
                                <span class="my-1">Categorias</span>
                                <a class="nav-link" id="cat-list-tab" data-toggle="pill" href="#cat-list" role="tab" aria-controls="cat-list" aria-selected="false">Listar</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active p-2" id="auth-req" role="tabpanel" aria-labelledby="auth-req-tab">
                                    <p><span class="gray">Requisitos para autenticar e exemplo</span>
                                        <br>
                                        Para obter resultados da API do ML online é necessário informar o token de autorização no cabeçalho da requisição.<br>
                                        Além disso, as URLs e parametrização deverão estar preenchidas corretamente, conforme descrita neste documento.<br><br>
                                        Abaixo segue exemplos de como informar o token no cabeçalho da requisição:
                                    </p>
                                    <h5>PHP</h5>
                                    <pre class="prettyprint lang-html linenums prettyprinted" style=""><ol class="linenums"><li class="L0"><span class="tag">$curl </span><span class="pln"> = curl_init();</span></li><li class="l1"><span class="pln">curl_setopt_array(</span><span class="tag">$curl</span><span class="pln">, </span><span class="tag">array</span><span class="pln">(</span></li><li class="l2"><span class="pln">    CURLOPT_URL => </span><span class="kwd">"https://app.marcalaser.com/api/products?category=Home&color=Black"</span><span class="pln">,</span></li><li class="l3"><span class="pln">    CURLOPT_RETURNTRANSFER =>  </span><span class="tag">true</span><span class="pln">,</span></li><li class="l4"><span class="pln">    CURLOPT_ENCODING =>  </span><span class="kwd">""</span><span class="pln">,</span></li><li class="l5"><span class="pln">    CURLOPT_MAXREDIRS =>  </span><span class="atv">10</span><span class="pln">,</span></li><li class="l6"><span class="pln">    CURLOPT_TIMEOUT =>  </span><span class="atv">0</span><span class="pln">,</span></li><li class="l7"><span class="pln">    CURLOPT_FOLLOWLOCATION =>  </span><span class="tag">true</span><span class="pln">,</span></li><li class="l8"><span class="pln">    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, </span></li><li class="l9"><span class="pln">    CURLOPT_FOLLOWLOCATION =>  </span><span class="kwd">"GET"</span><span class="pln">,</span></li><li class="l10"><span class="pln">    CURLOPT_HTTPHEADER =>  </span><span class="tag">array</span><span class="pln">(</span></li><li class="l11"><span class="kwd">         "Authorization: Bearer ***********"</span></li><li class="l12"><span class="pln">    ), </span></li><li class="l13"><span class="pln">)); </span></li><li class="L14"><span class="tag">$response </span><span class="pln"> = curl_exec(</span><span class="tag">$curl </span><span class="pln">);</span></li><li class="L15"><span class="pln">curl_close(</span><span class="tag">$curl</span><span class="pln">);</span></li><li class="L16"><span class="tag">echo $response</span><span class="pln">;</span></li></ol></pre>

                                </div>
                                <div class="tab-pane fade p-2" id="prod-list" role="tabpanel" aria-labelledby="prod-list-tab">
                                    <p><span class="gray">Requisição para consultar a lista de produtos.</span>
                                        <br>
                                        <span class="badge badge-pill badge-soft-success">GET</span><br>
                                        <h5>URL</h5>
                                        <code>https://app.marcalaser.com/api/products</code>
                                    </p>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Campo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><pre>limit (opcional)</pre></td>
                                                <td>Integer</td>
                                                <td>Total de resultados por página (máximo: 100, padrão: 100)</td>
                                            </tr>
                                            <tr>
                                                <td><pre>page (opcional)</pre></td>
                                                <td>Integer</td>
                                                <td>Retorna a página informada</td>
                                            </tr>
                                            <tr>
                                                <td><pre>direction (opcional)</pre></td>
                                                <td>String</td>
                                                <td>Ordenação da consulta (Valores aceitos: ’asc’ ou ‘desc’, padrão: 'asc')</td>
                                            </tr>
                                            <tr>
                                                <td><pre>sort (opcional)</pre></td>
                                                <td>String</td>
                                                <td>Ordena a consulta a partir da coluna informada (Valores aceitos: 'product_code', 'product_id', 'product_title', 'category_id', 'subcategory_id', ‘color_id’, 'product_provider', ‘available_on_site’, padrão: product_code)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5>SUCESSO (STATUS 200)</h5>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Campo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><pre>current_page</pre></td>
                                                <td>Integer</td>
                                                <td>Página da consulta atual</td>
                                            </tr>
                                            <tr>
                                                <td><pre>data</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Lista dos produtos</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   slug<pre></td>
                                                <td>String</td>
                                                <td>Slug do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   base_code<pre></td>
                                                <td>String</td>
                                                <td>Código base do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   product_title</pre></td>
                                                <td>String</td>
                                                <td>Título do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   product_description</pre></td>
                                                <td>String</td>
                                                <td>Descrição detalhada do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   product_ncm</pre></td>
                                                <td>String</td>
                                                <td>Código NCM do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   product_customization</pre></td>
                                                <td>String</td>
                                                <td>Personalização padrão para o produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   images</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Imagens do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   categories</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Categoria do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   subcategories</pre></td>
                                                <td>Object[ ]</td>
                                                <td>SubCategoria do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   colors</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Cor do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   product_packing_size</pre></td>
                                                <td>String</td>
                                                <td>Tamanho da embalagem</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   packing_type</pre></td>
                                                <td>String</td>
                                                <td>Tipo da embalagem</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   product_size</pre></td>
                                                <td>String</td>
                                                <td>Tamanho do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   available_on_site</pre></td>
                                                <td>Bool</td>
                                                <td>Disponível no site (0 = Indisponível, 1 = disponível)</td>
                                            </tr>
                                            <tr>
                                                <td><pre>first_page_url</pre></td>
                                                <td>String</td>
                                                <td>Link para a primeira página da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>from</pre></td>
                                                <td>Integer</td>
                                                <td>Offset do primeiro resultado da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>last_page</pre></td>
                                                <td>Integer</td>
                                                <td>Última página da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>last_page_url</pre></td>
                                                <td>String</td>
                                                <td>Link para a última página da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>next_page_url</pre></td>
                                                <td>String</td>
                                                <td>Link para a próxima página da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>path</pre></td>
                                                <td>String</td>
                                                <td>URL da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>per_page</pre></td>
                                                <td>Integer</td>
                                                <td>Limite de resultados por consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>prev_page_url</pre></td>
                                                <td>String</td>
                                                <td>Link para a página anterior da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>to</pre></td>
                                                <td>String</td>
                                                <td>Offset do último resultado da consulta</td>
                                            </tr>
                                            <tr>
                                                <td><pre>total</pre></td>
                                                <td>Integer</td>
                                                <td>Total de resultados do recurso</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5>FALHA (STATUS 40X)</h5>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>String</td>
                                                <td>Descrição do erro</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade p-2" id="prod-consultar" role="tabpanel" aria-labelledby="prod-consultar-tab">
                                    <p>
                                        <span class="gray">Requisição para a consulta de um produto específico.</span>
                                        <br>
                                        <span class="badge badge-pill badge-soft-success">GET</span><br>
                                        <h5>BASE URL</h5>
                                        <code>https://app.marcalaser.com/api/products?base_code=880022</code>

                                        <br>
                                        <br>
                                        <h5>EXEMPLO CONSULTA</h5>
                                        <code>https://app.marcalaser.com/api/products?category=Home&color=Black</code>

                                    </p>
                                    <h5>PARÂMETROS</h5>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Campo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><pre>slug</pre></td>
                                                <td>String</td>
                                                <td>Slug do produto (Ex.: kit-chaveiro)</td>
                                            </tr>
                                            <tr>
                                                <td><pre>base_code</pre></td>
                                                <td>String</td>
                                                <td>Código base do produto (Ex.: 880022)</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_ncm</pre></td>
                                                <td>String</td>
                                                <td>NCM do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_code</pre></td>
                                                <td>String</td>
                                                <td>Code?</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_title</pre></td>
                                                <td>String</td>
                                                <td>Nome do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_description</pre></td>
                                                <td>String</td>
                                                <td>Descricao do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>category</pre></td>
                                                <td>String</td>
                                                <td>Categoria do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>subcategory</pre></td>
                                                <td>String</td>
                                                <td>Sub Categoria do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>color</pre></td>
                                                <td>String</td>
                                                <td>Cor do produto</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <h5>SUCESSO (STATUS 200)</h5>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Campo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><pre>slug</pre></td>
                                                <td>String</td>
                                                <td>Slug do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>base_code</pre></td>
                                                <td>String</td>
                                                <td>Código base do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_code</pre></td>
                                                <td>String</td>
                                                <td>Código do produto com a cor concatenada</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_title</pre></td>
                                                <td>String</td>
                                                <td>Título do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_description</pre></td>
                                                <td>String</td>
                                                <td>Descrição detalhada do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_ncm</pre></td>
                                                <td>String</td>
                                                <td>Código NCM do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_customization</pre></td>
                                                <td>String</td>
                                                <td>Personalização padrão para o produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>images</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Imagens do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>categories</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Categoria do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>subcategories</pre></td>
                                                <td>Object[ ]</td>
                                                <td>SubCategoria do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>colors</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Cor do product</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_packing_size</pre></td>
                                                <td>String</td>
                                                <td>Tamanho da embalagem</td>
                                            </tr>
                                            <tr>
                                                <td><pre>packing_type</pre></td>
                                                <td>String</td>
                                                <td>Tipo da embalagem</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_size</pre></td>
                                                <td>String</td>
                                                <td>Tamanho do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>product_weight</pre></td>
                                                <td>String</td>
                                                <td>Peso do produto</td>
                                            </tr>
                                            <tr>
                                                <td><pre>available_on_site</pre></td>
                                                <td>Bool</td>
                                                <td>Disponível no site (0 = Indisponível, 1 = disponível)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5>FALHA (STATUS 40X)</h5>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>String</td>
                                                <td>Descrição do erro</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade p-2" id="cat-list" role="tabpanel" aria-labelledby="cat-list-tab">
                                    <p><span class="gray">Requisição para consultar a lista de categorias.</span>
                                        <br>
                                        <span class="badge badge-pill badge-soft-success">GET</span><br>
                                        <h5>URL</h5>
                                        <code>https://app.marcalaser.com/api/categorias</code>
                                    </p>
                                    <h5>SUCESSO (STATUS 200)</h5>
                                    <table class="table table-hover table-bordered w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Campo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><pre>categories</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Lista das categorias</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   category_id</pre></td>
                                                <td>Integer</td>
                                                <td>ID da categoria</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   category</pre></td>
                                                <td>String</td>
                                                <td>Descrição da categoria</td>
                                            </tr>
                                            <tr>
                                                <td><pre>subcategories</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Lista das subcategorias</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   sucategory_id</pre></td>
                                                <td>Integer</td>
                                                <td>ID da subcategoria</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   subcategory</pre></td>
                                                <td>String</td>
                                                <td>Descrição da subcategoria</td>
                                            </tr>
                                            <tr>
                                                <td><pre>colors</pre></td>
                                                <td>Object[ ]</td>
                                                <td>Lista das cores</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   color_id</pre></td>
                                                <td>Integer</td>
                                                <td>ID da cor</td>
                                            </tr>
                                            <tr>
                                                <td><pre>   color</pre></td>
                                                <td>String</td>
                                                <td>Nome da cor</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
