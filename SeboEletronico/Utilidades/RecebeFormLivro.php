<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/SeboEletronico";
include $SERVER_ADRESS.'/Controle/LivroControlador.php';
//require_once '';

switch($_POST['tipo']){
      
      case "cadastraLivro":  
                         $titulo = $_POST['titulo'];
                         $autor = $_POST['autor'];
                         $editora = $_POST['editora'];
                         $edicao = $_POST['edicao'];
                         $venda= $_POST['venda'];
                         $troca= $_POST['troca'];
                         $genero = $_POST['genero'];
                         $estado = $_POST['estado'];
                         $descricao = $_POST['descricao'];
                         $id_dono = $_POST['id_dono'];
                        
                         
                        $salvo = LivroControlador::salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono);
                         
                         
                         if (!empty($salvo)){
                              echo "<script>altert('Livro cadastrado com sucesso!')</script>";
                         }
                         else {
                             echo "<script>('Falha ao cadastrar o livro, tente novamente.')</script>";
                         }
                           
                            echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLivro.php';</script>";
                            
                          break;
      
      case "alterarLivro":   
                         $titulo = $_POST['titulo'];
                         $autor = $_POST['autor'];
                         $editora = $_POST['editora'];
                         $edicao = $_POST['edicao'];
                         $venda= $_POST['venda'];
                         $troca= $_POST['troca'];
                         $genero = $_POST['genero'];
                         $estado = $_POST['estado'];
                         $descricao = $_POST['descricao'];
                         $id_dono = $_POST['id_dono'];
                         $id = $_POST['id'];
                        
                        LivroControlador::alteraLivro($titulo, $autor, $genero, $edicao, $editora,$venda, $troca, $estado, $descricao, $id, $id_dono);
                        ?>
                            <script language="Javascript" type="text/javascript">
                                alert("Livro alterado com sucesso!!");
                            </script>  
                            
                            <script language = "Javascript">
                                window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLivro.php";
                            </script><?php
                        
                    break;
                    
        case "pesquisaLivro":
                        $titulo = $_POST['titulo'];
                        $estadoNovo = $_POST['novo'];
                        $estadoUsado = $_POST['usado'];
                        $disponibilidadeVenda = $_POST['venda'];
                        $disponibilidadeTroca = $_POST['troca'];

                        $listaLivros = LivroControlador::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
                        $idLivro = $listaLivros['id_livro'];
                 
                        ?>
                            <script language = "Javascript">
                                window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/listaDeLivros.php?livros=<?php echo $idLivro?>";
                            </script><?php
                break;
            
    }
    
   if($_REQUEST['id_livro']) {
    $idLivro = $_REQUEST['id_livro'];
    LivroControlador::deletaLivro($idLivro);
          
                        ?>
                            <script language="Javascript" type="text/javascript">
                                alert("Livro excluido com sucesso!!");
                            </script>
                            
                            <script language = "Javascript">
                                window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLivro.php";
                            </script><?php
   }
            
    
?>
