<?php
    require_once "Conexao.class.php";

    class Disciplina{
        private $nome;
        private $cargaHoraria;
        private $ementa;

        public function exibirDados(){
            echo "<br />";
            echo "O nome da ". __CLASS__ ." é ". $this->nome;
            echo "<br />";
            echo "A carga Horaria da ". __CLASS__ ." é ". $this->cargaHoraria;
            echo "<br />";
            echo "A ementa da ".__CLASS__." é ". $this->ementa;
        }

        public function __construct($nome="", $cargaHoraria="", $ementa=""){
            $this->nome = $nome;
            $this->cargaHoraria = $cargaHoraria;
            $this->ementa = $ementa;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function inserirDisciplina()
        {
            $cn = new Conexao();
            $conexaoBanco = $cn->getInstance();

            $stmt = $conexaoBanco->prepare("INSERT INTO disciplina VALUES (:nome, :cargaHoraria, :ementa)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cargaHoraria', $this->cargaHoraria);
            $stmt->bindParam(':ementa', $this->ementa);

            $resultado = $stmt->execute();

            if(!$resultado){
                echo "Erro, não foi possível inserir a disciplina";
                exit;
            }
            echo "Disciplina inserida com sucesso!";
        }
        
        public function buscarTodasDisciplinas(){
            $cn = new Conexao();
            $conexaoBanco = $cn->getInstance();
            
            $stmt = $conexaoBanco->prepare("SELECT * 
                                        FROM disciplina");

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        }

        public function atualizarDisciplina(){
            $cn = new Conexao();
            $conexaoBanco = $cn->getInstance();

            $stmt = $conexaoBanco->prepare("UPDATE disciplina SET
                                            cargaHoraria = :novaCarga,
                                            ementa = :novaEmenta
                                            WHERE nome = :nome");
            $stmt->bindParam(":novaCarga",$this->cargaHoraria);
            $stmt->bindParam(":novaEmenta", $this->ementa);
            $stmt->bindParam(":nome", $this->nome);

            $resultado = $stmt->execute();

            if(!$resultado){
                echo "Não foi possível atualizar a 
                disciplina";
                exit;
            }
            echo "Disciplina atualizada com sucesso";
        }
    }