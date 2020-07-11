<?php

    $idnivel = 0; 
    $Nivelnome = null;
    $admUsuario = null;
    $admProdutos = null; 
    $admFaleConosco = null;
    $admConteudo = null ;

    require_once('../bd/conexao.php');
    $conex = conexaoMysql();

    $action="../bd/Cms/inserirNivelCms.php?modo=inserir";

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'consultaEditar'){
            if(isset($_GET['id'])){

                $id = $_GET['id'];

                $sql="select tblnivel.*
                from
                tblnivel
                where
                tblnivel.idNivel = ".$id;

                $selectNivel = mysqli_query($conex, $sql);

                if($rsListNivel = mysqli_fetch_assoc($selectNivel)){

                    echo($rsListNivel['admConteudo']);

                    $idnivel = $rsListNivel['idNivel'];
                    $Nivelnome = $rsListNivel['nivelNome'];
                    $admUsuario = $rsListNivel['admUsuario'];
                    $admProdutos = $rsListNivel['admProduto'];
                    $admFaleConosco = $rsListNivel['admFaleconosco'];
                    $admConteudo = $rsListNivel['admConteudo'];
                    $action = "../bd/Cms/updatenivelCms.php?modo=atualizar&id=" . $rsListNivel['idNivel'];

                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Padoka | Admin | CMS</title>
</head>
<body>
    <div class="main">
        <section class="container">
            <div class="containertop">
                <div class="cmsTitle">
                    <h1>CMS - SISTEMA DE GERENCIAMENTO PADOKA</h1>
                </div>
                <div class="imgTitle">

                </div>
             </div>
        </section>
    <header>
        <div class="container">
            <div class="menu">
                <nav class="menu-nav">
                    <ul class="menu-ul">
                        <li class="menu-li">
                            <a href=""><div>
                                <svg class="svg" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m450.085 273.527c.621-6.282.915-11.978.915-17.527 0-5.55-.294-11.245-.915-17.529l47.484-53.548c4.284-4.831 4.996-11.861 1.767-17.452l-45-77.942c-3.228-5.591-9.67-8.487-15.998-7.195l-70.178 14.361c-9.779-6.934-19.957-12.873-30.395-17.734l-22.514-68.635c-2.019-6.161-7.768-10.326-14.251-10.326h-90c-6.479 0-12.225 4.159-14.249 10.313l-22.578 68.647c-10.38 4.841-20.541 10.78-30.336 17.733l-70.176-14.36c-6.328-1.297-12.77 1.604-15.998 7.195l-45 77.942c-3.229 5.591-2.517 12.622 1.767 17.452l47.484 53.548c-.62 6.284-.914 11.98-.914 17.53s.294 11.245.915 17.528l-47.485 53.548c-4.284 4.831-4.996 11.861-1.767 17.452l45 77.942c3.228 5.592 9.674 8.489 15.997 7.195l70.179-14.359c9.775 6.931 19.953 12.87 30.389 17.731l22.221 67.729c2.804 10.821 13.122 11.234 14.504 11.234h90.047c2.764 0 11.253-1.203 14.249-10.313l22.578-68.649c10.385-4.844 20.543-10.781 30.336-17.731l70.176 14.359c6.325 1.293 12.769-1.604 15.997-7.195l45-77.942c3.229-5.591 2.517-12.621-1.767-17.452zm-247.452-5.046 45 30c5.038 3.358 11.603 3.358 16.641 0l45-30c4.173-2.782 6.68-7.466 6.68-12.481v-86.187c27.901 19.354 45 51.198 45 86.187 0 57.897-47.103 105-105 105s-105-47.103-105-105c0-34.988 17.099-66.832 45-86.187v86.187c-.001 5.015 2.505 9.699 6.679 12.481zm23.32 213.519v-94.365c9.652 2.199 19.692 3.365 30 3.365s20.348-1.166 30-3.365v94.365zm207.809-83.893-61.592-12.603c-5.069-2.635-11.336-2.198-16.039 1.405-11.605 8.89-23.811 16.052-36.278 21.285-1.433.602-2.74 1.422-3.9 2.407v-33.693c44.413-22.129 75-68.01 75-120.909 0-27.369-8.182-53.744-23.66-76.275-15.099-21.979-36.087-38.876-60.697-48.868-4.625-1.877-9.879-1.331-14.02 1.456-4.14 2.788-6.623 7.452-6.623 12.443v103.217l-30 20-30-20v-103.217c0-4.991-2.482-9.655-6.623-12.443-4.14-2.788-9.395-3.332-14.02-1.456-24.61 9.992-45.598 26.89-60.697 48.868-15.479 22.531-23.66 48.907-23.66 76.275 0 52.898 30.587 98.78 75 120.909v33.572c-1.122-.929-2.374-1.711-3.746-2.286-12.556-5.271-24.782-12.432-36.339-21.285-4.702-3.603-10.969-4.04-16.038-1.405l-61.592 12.603-34.189-59.217 41.889-47.237c4.674-3.095 7.336-8.645 6.593-14.421-1.045-8.114-1.531-14.86-1.531-21.232s.486-13.12 1.531-21.236c.743-5.778-1.92-11.328-6.596-14.423l-41.886-47.234 34.188-59.217 61.592 12.604c5.069 2.635 11.337 2.197 16.04-1.405 11.612-8.897 23.817-16.058 36.276-21.286 4.007-1.681 7.088-5.017 8.445-9.145l21.267-64.658h68.277l21.206 64.648c1.356 4.133 4.438 7.474 8.449 9.156 12.555 5.268 24.782 12.43 36.342 21.286 4.703 3.602 10.969 4.042 16.04 1.405l61.592-12.604 34.188 59.217-41.884 47.233c-4.677 3.095-7.34 8.646-6.597 14.424 1.044 8.115 1.53 14.863 1.53 21.235s-.486 13.118-1.531 21.232c-.743 5.777 1.918 11.327 6.594 14.422l41.888 47.237z"/></g></svg>
                            </div>
                            <h4 class="text-menu">Adm Conteúdo</h4></a>
                        </li>

                        <li class="menu-li">
                        <a href="admFaleConosco.php"><div>
                                <svg id="Capa_1" class="svg suport" enable-background="new 0 0 512.05 512.05" height="512" viewBox="0 0 512.05 512.05" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m299.42 389.736v13.779c0 7.122 5.795 12.917 12.917 12.917h52.579c7.122 0 12.917-5.795 12.917-12.917v-13.779c0-7.122-5.795-12.917-12.917-12.917h-52.579c-7.122 0-12.917 5.795-12.917 12.917zm15 2.083h48.413v9.613h-48.413z"/><path d="m296.672 194.458c-4.143 0-7.5 3.357-7.5 7.5v9.069c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-9.069c0-4.143-3.357-7.5-7.5-7.5z"/><path d="m207.878 201.958v9.069c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-9.069c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5z"/><path d="m268.371 241.06c-8.537 6.48-16.152 6.482-24.693 0-3.302-2.503-8.004-1.858-10.509 1.44-2.504 3.3-1.858 8.005 1.44 10.509 7.006 5.315 14.211 7.974 21.416 7.974 7.204 0 14.409-2.658 21.414-7.974 3.3-2.505 3.944-7.209 1.44-10.509s-7.208-3.945-10.508-1.44z"/><path d="m374.838 314.258c-14.061-15.372-32.095-26.152-51.923-31.316 3.476-3.315 6.72-6.905 9.698-10.75 6.467-.904 11.809-5.315 14.049-11.253h11.397c7.748 0 14.051-6.303 14.051-14.051v-17.49c11.38-5.412 19.268-17.019 19.268-30.436v-8.802c0-12.812-7.191-23.975-17.748-29.668v-65.123c0-32.399-23.407-59.706-54.198-65.713l1.751-3.156c3.777-6.811 2.82-14.923-2.438-20.668-5.257-5.744-13.254-7.414-20.37-4.252l-48.053 21.34c-17.808 7.912-30.7 4.777-44.948 5.494-10.735 0-21.431 2.62-30.93 7.576-3.672 1.916-5.096 6.446-3.18 10.119s6.445 5.095 10.119 3.18c7.471-3.898 15.542-5.875 23.99-5.875 13.617-.76 29.515 2.776 51.037-6.785l48.051-21.341c1.609-.718 2.706.112 3.217.671s1.24 1.724.386 3.265l-7.249 13.07c-1.281 2.31-1.253 5.123.074 7.406 1.326 2.283 3.757 3.7 6.397 3.73 28.31.329 51.342 23.628 51.342 51.938v61.132c-.312-.009-.622-.024-.936-.024h-4.851v-24.816c0-2.768-1.524-5.31-3.965-6.614-2.439-1.306-5.401-1.159-7.702.379-6.488 4.336-13.089 8.243-19.618 11.612-3.682 1.9-5.125 6.424-3.226 10.104 1.9 3.682 6.425 5.123 10.104 3.226 3.129-1.615 6.271-3.343 9.406-5.173v67.783c0 7.347-.984 14.554-2.887 21.536-1.526-.431-3.128-.678-4.79-.678h-26.084c-9.729 0-17.644 7.914-17.644 17.643v3.263c0 9.729 7.915 17.643 17.644 17.643h8.172c-15.069 14.23-35.184 22.413-56.229 22.413-45.114 0-81.817-36.703-81.817-81.818 0-22.644 0-45.171 0-67.782 41.39 24.135 83.349 29.935 124.899 17.221 3.961-1.212 6.189-5.405 4.978-9.366s-5.401-6.19-9.366-4.978c-20.444 6.256-41.162 7.553-61.571 3.855-20.583-3.728-41.534-12.645-62.272-26.503-2.302-1.538-5.262-1.685-7.702-.379-2.44 1.304-3.965 3.847-3.965 6.614v32.988c-1.984.007-3.919.225-5.786.629v-69.909c0-10.152 2.939-19.996 8.501-28.466 2.273-3.462 1.31-8.112-2.153-10.386-3.46-2.272-8.111-1.31-10.386 2.153-7.171 10.922-10.962 23.611-10.962 36.698v78.75c-4.308 4.899-6.929 11.316-6.929 18.337v4.213c0 15.334 12.476 27.81 27.81 27.81h.591c2.719 22.867 13.434 43.316 29.268 58.458-19.839 5.161-37.882 15.944-51.95 31.323-18.068 19.752-28.019 45.383-28.019 72.171v98.319c0 15.055 12.247 27.302 27.302 27.302h23.467c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-23.467c-6.783 0-12.302-5.519-12.302-12.302v-98.319c0-23.031 8.554-45.066 24.087-62.047 10.944-11.964 24.684-20.692 39.828-25.536-2.01 6.021-1.88 12.725.715 18.812l27.721 65.021c.891 2.088 2.679 3.661 4.863 4.277 4.207 1.184 6.884-1.563 7.531-1.924l4.656 4.656-22.658 107.361h-20.985c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h185.605c15.055 0 27.302-12.247 27.302-27.302v-98.319c.001-26.788-9.95-52.419-28.018-72.171zm-228.346-117.59v-4.213c0-7.032 5.695-12.759 12.715-12.81v29.832c-7.019-.05-12.715-5.776-12.715-12.809zm138.869 171.56-20.165-14.337 19.575-48.488c6.811-2.125 13.36-5 19.53-8.55l1.835 1.503c3.933 3.224 5.287 8.741 3.293 13.419zm61.696-122.288c1.577-4.349 2.833-8.785 3.765-13.293h6.288v13.293zm10.637-74.463c10.302 0 18.684 8.382 18.684 18.685v8.802c0 10.302-8.382 18.684-18.684 18.684h-4.851v-4.669-41.501h4.851zm-56.256 83.264v-3.263c0-1.457 1.186-2.643 2.644-2.643h26.084c1.457 0 2.643 1.186 2.643 2.643v3.263c0 1.457-1.186 2.643-2.643 2.643h-26.084c-1.459-.001-2.644-1.186-2.644-2.643zm-34.358 54.411-11.055 27.383-11.051-27.374c3.628.414 7.314.634 11.05.634 3.716.001 7.406-.22 11.056-.643zm-64.458 2.624c-1.994-4.678-.64-10.195 3.293-13.419l1.817-1.489c6.131 3.543 12.684 6.435 19.565 8.578l19.558 48.445-20.165 14.337zm53.403 53.999 14.687 10.442-14.687 14.688-14.687-14.688zm-29.761 131.275 19.989-94.703c3.442 2.921 5.097 6.664 9.772 6.664 4.674 0 6.331-3.744 9.773-6.665l19.989 94.704zm161.593-12.301c0 6.783-5.519 12.302-12.302 12.302h-74.439l-22.661-107.362 4.656-4.656c.542.257 3.261 3.126 7.532 1.924 2.185-.616 3.973-2.189 4.863-4.277l27.721-65.021c2.595-6.087 2.725-12.792.715-18.812 15.143 4.844 28.884 13.572 39.828 25.536 15.533 16.98 24.087 39.016 24.087 62.047z"/></g></svg>
                            </div>
                            <h4 class="text-menu">Adm Fale Conosco</h4></a>
                        </li>

                        <li class="menu-li">
                        <a href="admUsuarios.php"><div>
                        <svg id="Layer_1" class="svg" enable-background="new 0 0 480.063 480.063" height="512" viewBox="0 0 480.063 480.063" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m402.032 424.806v47.257c0 4.418-3.582 8-8 8s-8-3.582-8-8v-47.257c0-36.795-29.775-66.572-66.573-66.571-17.411 0-33.208-8.87-42.259-23.728-2.298-3.773-1.103-8.696 2.671-10.994 3.773-2.299 8.695-1.103 10.994 2.671 6.122 10.051 16.811 16.051 28.594 16.051 45.637-.002 82.573 36.93 82.573 82.571zm-139.606-80.193c.941 4.317-1.796 8.579-6.113 9.52-21.054 4.587-42.467-.005-59.516-11.642-16.878 18.087-39.176 15.744-36.191 15.744-36.795-.001-66.573 29.773-66.573 66.571v47.257c0 4.418-3.582 8-8 8s-8-3.582-8-8v-47.257c0-45.636 36.929-82.571 82.571-82.571 18.462 0 33.429-14.875 33.429-33.342v-2.107c-34.919-16.697-59.429-51.784-60.923-92.643-14.37-3.455-25.077-16.317-25.077-31.62v-41.473c-.437-20.3 2.577-71.143 39.648-106.877 45.775-44.126 119.183-41.323 173.161-15.338 5.261 2.535 6.06 9.643 1.691 13.324 27.345 6.67 50.925 23.48 66.074 47.538.782 1.239 2.214 3.184 1.84 6.287-.232 1.931-.807 3.565-2.295 5.075-9.75 9.888-15.119 22.991-15.119 36.896v54.57c0 4.418-3.582 8-8 8s-8-3.582-8-8v-54.57c0-16.037 5.479-31.259 15.542-43.487-15.338-21.936-39.268-36.044-66.332-38.942l-14.061-1.506c-8.222-.88-9.835-12.207-2.194-15.352l6.395-2.633c-83.286-29.035-172.351 3.226-172.351 114.928v41.56c0 6.348 3.656 11.865 9 14.636v-51.863c0-30.878 25.122-56 56-56h102c30.878 0 56 25.12 56 55.997v65.503c0 69.574-67.988 122.42-137.17 102.053-.45 5.708-1.871 11.216-4.186 16.336 13.458 9.242 30.453 12.97 47.23 9.314 4.317-.94 8.579 1.797 9.52 6.114zm-22.394-43.425c50.178 0 91-40.822 91-91v-64.895c0-22.054-17.944-39.997-40-39.997h-102c-22.056 0-40 17.944-40 40v64.892c0 50.178 40.822 91 91 91zm81 137.875h-24c-4.418 0-8 3.582-8 8s3.582 8 8 8h24c4.418 0 8-3.582 8-8s-3.582-8-8-8z"/></svg>
                            </div>
                            <h4 class="text-menu">Adm Usuários</h4></a>
                        </li>

                    </ul>
                </nav>
                <div class="Containerinfo">
                    <div class="welcome">
                        <p>Bem-VINDO.Usuario</p>
                    </div>
                    <div class="exit">
                        <p><a href="#">Exit</a></p>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="containerItens">
                <div class="containerFormUsuario"> n
                    <form action="<?=$action?>" class="" method="post">
                    <div class="rgtPerm">Registro de Permissões</div>
                    <input type="text" class="formInput" value="<?=$Nivelnome?>" name="nome" placeholder="Insira o nome do usuario">
                        <div class="subtitle">Esse usuario será:</div>
                        <div></div>
                        <div class="container-input-radio">

                        <div class="float-adm">
                            <span class="">AdmProdutos</span>
                            <div class="">
                                <svg class="facticon" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"><g><path d="m95.386 51.289-16.265-6.3a16.03 16.03 0 1 0 -30.242 0l-16.265 6.3a1.75 1.75 0 0 0 -1.114 1.631v37.728a1.75 1.75 0 0 0 1.117 1.632l30.75 11.92a1.757 1.757 0 0 0 .633.118 1.733 1.733 0 0 0 .624-.13l.009.012 30.753-11.92a1.75 1.75 0 0 0 1.114-1.632v-37.728a1.75 1.75 0 0 0 -1.114-1.631zm-5.475 1.631-5.677 2.2-9.408-3.62a16.115 16.115 0 0 0 2.774-3.35zm-18.527 1.006 8 3.077-4.517 1.75-8.286-3.237a15.922 15.922 0 0 0 4.803-1.59zm5.445 7.819 5.877-2.278v7.291l-.983-.641a1.751 1.751 0 0 0 -2.229.266l-2.665 2.828zm-12.829-34.563a12.53 12.53 0 1 1 -12.53 12.53 12.544 12.544 0 0 1 12.53-12.53zm-12.6 22.4-2.342-.915 1.341-.52a16.064 16.064 0 0 0 1.001 1.438zm-7.169.956 25.804 10.087-6.035 2.339-25.911-10.044zm-9.231 38.911v-33.973l27.25 10.564v33.973zm30.75 10.564v-33.973l7.579-2.94v10.521a1.75 1.75 0 0 0 1.105 1.626 1.731 1.731 0 0 0 .645.124 1.749 1.749 0 0 0 1.274-.55l4.685-4.973 2.463 1.6a1.75 1.75 0 0 0 2.7-1.466v-11.872l6.799-2.634v33.973z"/><path d="m60.883 44.862a1.75 1.75 0 0 0 2.3-.034l8.487-7.628a1.75 1.75 0 1 0 -2.34-2.6l-7.352 6.609-3.348-2.83a1.75 1.75 0 0 0 -2.26 2.673z"/></g></svg>
                            </div>
                            <div class="">
                                <input type="checkbox" name="checknive1" class="radio" value="true" <?php if($admProdutos == '1') echo('checked="checked"') ?> id="">Sim
                            </div>
                        </div>
                                
                        <div class="float-adm">
                            <span class="">AdmConteudo</span>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="facticon" viewBox="0 0 128 128"><g><path d="M107.177,12.476H83.233v-1.79A6.135,6.135,0,0,0,77.1,4.557H50.9a6.135,6.135,0,0,0-6.129,6.129v1.79H20.823a1.749,1.749,0,0,0-1.75,1.75V121.693a1.749,1.749,0,0,0,1.75,1.75h86.354a1.749,1.749,0,0,0,1.75-1.75V14.226A1.749,1.749,0,0,0,107.177,12.476ZM95.039,25.839v83.772H32.96V25.839ZM48.267,10.686A2.632,2.632,0,0,1,50.9,8.057H77.1a2.632,2.632,0,0,1,2.629,2.629V22.339H48.267Zm57.16,109.257H22.573V15.976H44.767v6.363H31.21a1.75,1.75,0,0,0-1.75,1.75v87.272a1.75,1.75,0,0,0,1.75,1.75H96.789a1.749,1.749,0,0,0,1.75-1.75V24.089a1.749,1.749,0,0,0-1.75-1.75H83.233V15.976h22.194Z"/><path d="M41.653,77.339H57.38a1.749,1.749,0,0,0,1.75-1.75V62.508l3.523-3.523a1.75,1.75,0,0,0-2.475-2.474l-1.871,1.871a1.736,1.736,0,0,0-.927-.271H41.653a1.751,1.751,0,0,0-1.75,1.75V75.589A1.75,1.75,0,0,0,41.653,77.339ZM43.4,61.611H55.077L49.528,67.16l-1.395-1.395a1.75,1.75,0,0,0-2.475,2.474l2.633,2.633a1.749,1.749,0,0,0,2.475,0l4.864-4.864v7.831H43.4Z"/><path d="M41.653,103.089H57.38a1.749,1.749,0,0,0,1.75-1.75V88.258l3.523-3.523a1.75,1.75,0,1,0-2.475-2.474l-1.871,1.871a1.736,1.736,0,0,0-.927-.271H41.653a1.751,1.751,0,0,0-1.75,1.75v15.728A1.75,1.75,0,0,0,41.653,103.089ZM43.4,87.361H55.077L49.528,92.91l-1.395-1.395a1.75,1.75,0,0,0-2.475,2.474l2.633,2.633a1.749,1.749,0,0,0,2.475,0l4.864-4.864v7.831H43.4Z"/><path d="M41.653,51.589H57.38a1.749,1.749,0,0,0,1.75-1.75V36.758l3.523-3.523a1.75,1.75,0,0,0-2.475-2.474l-1.871,1.871a1.736,1.736,0,0,0-.927-.271H41.653a1.751,1.751,0,0,0-1.75,1.75V49.839A1.75,1.75,0,0,0,41.653,51.589ZM43.4,35.861H55.077L49.528,41.41l-1.395-1.395a1.75,1.75,0,1,0-2.475,2.474l2.633,2.633a1.749,1.749,0,0,0,2.475,0l4.864-4.864v7.831H43.4Z"/><path d="M65.652,43.725H86.347a1.75,1.75,0,0,0,0-3.5H65.652a1.75,1.75,0,0,0,0,3.5Z"/><path d="M65.652,69.475H86.347a1.75,1.75,0,1,0,0-3.5H65.652a1.75,1.75,0,0,0,0,3.5Z"/><path d="M65.652,95.225H86.347a1.75,1.75,0,1,0,0-3.5H65.652a1.75,1.75,0,0,0,0,3.5Z"/></g></svg>
                            </div>
                            <div class="">
                                <input type="checkbox" name="checknive2" class="radio" value="true" <?php if($admConteudo == '1') echo('checked="checked"') ?>  id="">Sim
                            </div>
                        </div>

                        <div class="float-adm">
                            <span class="">AdmFaleConosco</span>
                            <div class="">                
                                <svg id="Capa_1"class="facticon" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m512 280c0-41.662-29.55-75.871-66.858-78.776-4.425-14.913-16.381-26.614-31.446-30.673-10.046-82.583-77.106-145.551-157.696-145.551s-147.65 62.968-157.695 145.551c-15.065 4.059-27.022 15.759-31.446 30.673-1.296.101-2.582.24-3.858.416v-97.64c0-8.284-6.716-15-15-15s-15 6.716-15 15v109.646c-19.837 14.084-33.001 38.556-33.001 66.354 0 41.662 29.55 75.871 66.858 78.776 4.411 14.866 16.305 26.537 31.303 30.632 6.39 37.194 38.85 65.592 77.839 65.592h3.469c6.276 18.58 23.86 32 44.531 32h64c25.916 0 47-21.084 47-47s-21.084-47-47-47h-64c-20.671 0-38.255 13.42-44.531 32h-3.469c-22.683 0-41.81-15.496-47.366-36.456 17.648-6.088 30.366-22.854 30.366-42.544v-132c0-19.759-12.806-36.572-30.55-42.606 9.37-66.256 63.146-116.394 127.55-116.394s118.18 50.138 127.55 116.394c-17.744 6.034-30.55 22.847-30.55 42.606v132c0 24.813 20.187 45 45 45h4c20.375 0 37.621-13.616 43.142-32.224 37.308-2.905 66.858-37.114 66.858-78.776zm-288 143h64c9.374 0 17 7.626 17 17s-7.626 17-17 17h-64c-9.374 0-17-7.626-17-17s7.626-17 17-17zm-194-143c0-23.787 15.425-44.268 35-48.287v96.573c-19.575-4.018-35-24.499-35-48.286zm99 66c0 8.271-6.729 15-15 15h-4c-8.271 0-15-6.729-15-15 0-48.134 0-87.504 0-132 0-8.271 6.729-15 15-15h4c8.271 0 15 6.729 15 15zm288 0c0 8.271-6.729 15-15 15h-4c-8.271 0-15-6.729-15-15v-132c0-8.271 6.729-15 15-15h4c8.271 0 15 6.729 15 15zm30-17.713v-96.573c19.575 4.019 35 24.5 35 48.287s-15.425 44.267-35 48.286z"/></g></svg>
                            </div>
                            <div class="">
                                <input type="checkbox" name="checknive3" class="radio" value="true" <?php if($admFaleConosco == '1') echo('checked="checked"') ?>  id="">Sim
                            </div>
                        </div>

                        <div class="float-adm">
                            <span class="">AdmUsuario</span>
                            <div class="">
                                <svg class="facticon" viewBox="-42 0 512 512.002" xmlns="http://www.w3.org/2000/svg"><path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0"/><path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0"/></svg>
                            </div>
                            <div class="">
                                <input type="checkbox" name="checknive4" class="radio" value="true" <?php if($admUsuario == '1') echo('checked="checked"') ?>  id="">Sim
                            </div>
                        </div>
                        <div class="btn-align">
                             <input type="submit" name="btnSalvar" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>  
                </div>
                
            </div>
            <div class="table-container">
                <table class="table-basic">
                    <tr>
                        <th>Nome</th>
                        <th>AdmConteudo</th>
                        <th>AdmFaleConosco</th>
                        <th>admUsuarios</th>
                        <th>AdmProdutos</th>
                        <th>Ação</th>
                    </tr>
                    <?php
                        $sql="select 
                        tblnivel.idNivel,
                        tblnivel.nivelNome,
                        tblnivel.admConteudo,
                        tblnivel.admFaleconosco,
                        tblnivel.admUsuario,
                        tblnivel.admProduto
                        from 
                        tblnivel
                        where
                        tblnivel.idNivel order by tblnivel.idNivel desc";

                        $selectNivel = mysqli_query($conex, $sql);
                        while ($rsNivel = mysqli_fetch_assoc($selectNivel))
                        {

                    ?>
                    <tr>
                        <td><?=$rsNivel['nivelNome']?></td>
                        <td><?=$rsNivel['admConteudo']?></td>
                        <td><?=$rsNivel['admFaleconosco']?></td>
                        <td><?=$rsNivel['admUsuario']?></td>
                        <td><?=$rsNivel['admProduto']?></td>
                        <td class="td-body">
                            <div class="iconDiv">
                                <a href="../bd/Cms/deletarNivelCms.php?modo=excluir&id=<?=$rsNivel['idNivel']?>" onclick="return confirm('Ola tudo bem ? , deseja realmente excluir esse usuario ?');">
                                    <svg class="icon" viewBox="-57 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m156.371094 30.90625h85.570312v14.398438h30.902344v-16.414063c.003906-15.929687-12.949219-28.890625-28.871094-28.890625h-89.632812c-15.921875 0-28.875 12.960938-28.875 28.890625v16.414063h30.90625zm0 0"/><path d="m344.210938 167.75h-290.109376c-7.949218 0-14.207031 6.78125-13.566406 14.707031l24.253906 299.90625c1.351563 16.742188 15.316407 29.636719 32.09375 29.636719h204.542969c16.777344 0 30.742188-12.894531 32.09375-29.640625l24.253907-299.902344c.644531-7.925781-5.613282-14.707031-13.5625-14.707031zm-219.863282 312.261719c-.324218.019531-.648437.03125-.96875.03125-8.101562 0-14.902344-6.308594-15.40625-14.503907l-15.199218-246.207031c-.523438-8.519531 5.957031-15.851562 14.472656-16.375 8.488281-.515625 15.851562 5.949219 16.375 14.472657l15.195312 246.207031c.527344 8.519531-5.953125 15.847656-14.46875 16.375zm90.433594-15.421875c0 8.53125-6.917969 15.449218-15.453125 15.449218s-15.453125-6.917968-15.453125-15.449218v-246.210938c0-8.535156 6.917969-15.453125 15.453125-15.453125 8.53125 0 15.453125 6.917969 15.453125 15.453125zm90.757812-245.300782-14.511718 246.207032c-.480469 8.210937-7.292969 14.542968-15.410156 14.542968-.304688 0-.613282-.007812-.921876-.023437-8.519531-.503906-15.019531-7.816406-14.515624-16.335937l14.507812-246.210938c.5-8.519531 7.789062-15.019531 16.332031-14.515625 8.519531.5 15.019531 7.816406 14.519531 16.335937zm0 0"/><path d="m397.648438 120.0625-10.148438-30.421875c-2.675781-8.019531-10.183594-13.429687-18.640625-13.429687h-339.410156c-8.453125 0-15.964844 5.410156-18.636719 13.429687l-10.148438 30.421875c-1.957031 5.867188.589844 11.851562 5.34375 14.835938 1.9375 1.214843 4.230469 1.945312 6.75 1.945312h372.796876c2.519531 0 4.816406-.730469 6.75-1.949219 4.753906-2.984375 7.300781-8.96875 5.34375-14.832031zm0 0"/></svg>
                                </a>
                                <a class="pesquisar" onclick="visualizarUsuario(<?=$rsNivel['idNivel']?>);">
                                    <svg id="Capa_1" class="icon" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m293.613 312.202h92.947v55.768h-92.947z" fill="#2b4d66" transform="matrix(.707 -.707 .707 .707 -140.868 340.086)"/></g><g><path d="m351.637 351.636h55.768v55.768h-55.768z" fill="#4a80aa" transform="matrix(.707 -.707 .707 .707 -157.203 379.52)"/></g><g><path d="m504.503 438.779-.028 65.696-65.696.027-72.403-72.402 65.724-65.724z" fill="#407093"/></g><g><path d="m504.503 438.779-.028 43.788-94.283-94.283 21.908-21.908z" fill="#365e7d"/></g><g><circle cx="193.303" cy="193.304" fill="#407093" r="185.895"/></g><g><path d="m305.722 45.255c23.743 31.22 37.847 70.169 37.847 112.418 0 102.667-83.228 185.895-185.895 185.895-42.249 0-81.199-14.104-112.418-37.846 33.954 44.646 87.63 73.476 148.048 73.476 102.667 0 185.895-83.228 185.895-185.895-.001-60.417-28.831-114.094-73.477-148.048z" fill="#365e7d"/></g><g><circle cx="193.303" cy="193.304" fill="#e4f6ff" r="136.323"/></g><g><path d="m275.627 84.645c17.358 22.875 27.665 51.394 27.665 82.323 0 75.289-61.034 136.323-136.323 136.323-30.93 0-59.448-10.307-82.323-27.664 24.895 32.807 64.299 54 108.658 54 75.289 0 136.323-61.034 136.323-136.323-.001-44.36-21.193-83.764-54-108.659z" fill="#d3effb"/></g><g><path d="m173.101 271.528c3.264 0 6.268-2.148 7.209-5.442l40.411-141.442c1.139-3.983-1.168-8.135-5.151-9.274-3.982-1.138-8.136 1.168-9.274 5.152l-40.411 141.442c-1.139 3.983 1.168 8.135 5.151 9.273.689.197 1.382.291 2.065.291z"/><path d="m243.608 249.23c1.454 1.397 3.326 2.09 5.194 2.09 1.971 0 3.939-.773 5.412-2.306l48.495-50.515c2.787-2.903 2.787-7.488 0-10.391l-48.495-50.514c-2.869-2.989-7.619-3.084-10.607-.216-2.988 2.869-3.086 7.618-.216 10.606l43.507 45.319-43.507 45.32c-2.869 2.989-2.771 7.738.217 10.607z"/><path d="m143 137.378c-2.989-2.87-7.738-2.771-10.606.216l-48.495 50.514c-2.787 2.903-2.787 7.488 0 10.391l48.495 50.515c1.473 1.534 3.441 2.306 5.412 2.306 1.869 0 3.74-.693 5.194-2.09 2.988-2.869 3.086-7.618.216-10.606l-43.507-45.32 43.507-45.319c2.869-2.99 2.772-7.738-.216-10.607z"/><path d="m509.804 433.472-72.404-72.404c-2.93-2.928-7.679-2.928-10.609 0l-7.839 7.839-28.821-28.821 7.84-7.84c2.929-2.93 2.929-7.679 0-10.609l-35.177-35.178c7.207-13.09 12.908-26.994 16.902-41.436 8.582-31.031 9.286-64.026 2.038-95.418-.933-4.036-4.962-6.554-8.997-5.621-4.037.932-6.553 4.96-5.621 8.997 13.954 60.438-3.865 122.671-47.664 166.47-34.785 34.78-80.461 52.168-126.15 52.164-45.678-.004-91.37-17.392-126.141-52.163-69.552-69.562-69.552-182.739 0-252.291 69.552-69.552 182.73-69.552 252.29 0 15.704 15.703 28.169 33.86 37.051 53.966 1.674 3.79 6.105 5.505 9.893 3.831 3.79-1.674 5.505-6.103 3.831-9.892-9.633-21.808-23.146-41.494-40.166-58.514-75.41-75.4-198.104-75.402-273.508 0-75.401 75.402-75.401 198.097 0 273.508 37.705 37.704 87.22 56.556 136.75 56.551 32.126-.003 64.256-7.948 93.16-23.815l35.175 35.175c1.465 1.464 3.385 2.197 5.305 2.197s3.84-.733 5.305-2.197l7.84-7.84 28.821 28.821-7.839 7.839c-2.929 2.93-2.929 7.679 0 10.609l21.624 21.624c1.465 1.464 3.385 2.197 5.305 2.197s3.84-.733 5.305-2.197c2.929-2.93 2.929-7.679 0-10.609l-16.32-16.319 55.114-55.114 67.099 67.1c2.93 2.928 7.679 2.928 10.609 0 2.928-2.931 2.928-7.68-.001-10.61zm-182.862-51.415-27.233-27.233c10.734-7.074 20.914-15.329 30.351-24.764 9.29-9.29 17.563-19.486 24.743-30.372l27.254 27.254zm23.754-2.536 28.825-28.825 28.821 28.821-28.825 28.825z"/><path d="m418.045 473.16c-2.928-2.928-7.678-2.929-10.608.001-2.929 2.929-2.929 7.679.001 10.608l26.035 26.034c1.464 1.464 3.384 2.197 5.304 2.197s3.84-.733 5.305-2.198c2.929-2.929 2.929-7.679-.001-10.608z"/><path d="m60.048 163.556c-4.088-.676-7.949 2.089-8.625 6.177-7.563 45.716 7.459 92.546 40.183 125.27 27.161 27.166 63.277 42.128 101.694 42.128 38.416 0 74.535-14.961 101.702-42.127 27.166-27.166 42.127-63.285 42.127-101.702s-14.962-74.533-42.127-101.694c-27.166-27.167-63.284-42.128-101.701-42.128s-74.533 14.962-101.691 42.125c-12.483 12.473-22.429 26.887-29.561 42.843-1.691 3.782.005 8.218 3.787 9.909 3.778 1.689 8.219-.005 9.909-3.787 6.382-14.276 15.287-27.18 26.472-38.355 24.328-24.333 56.675-37.733 91.085-37.733s66.76 13.401 91.093 37.734c24.333 24.328 37.733 56.676 37.733 91.084 0 34.41-13.401 66.76-37.734 91.092s-56.683 37.734-91.092 37.734-66.757-13.4-91.085-37.734c-29.311-29.31-42.766-71.259-35.991-112.213.675-4.085-2.09-7.947-6.178-8.623z"/></g></g></svg>
                                </a>
                                <a href="admnivel.php?modo=consultaEditar&id=<?=$rsNivel['idNivel']?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="scripts/scripts.js"></script>
</body>
</html>