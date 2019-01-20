<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181231130717 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE domaines (id INT AUTO_INCREMENT NOT NULL, domaine VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujets (id INT AUTO_INCREMENT NOT NULL, nature_id INT NOT NULL, domaine_id INT NOT NULL, sous_domaine_id INT NOT NULL, statut_id INT NOT NULL, objet VARCHAR(255) NOT NULL, qui VARCHAR(255) NOT NULL, inscription DATETIME NOT NULL, INDEX IDX_959E33AB3BCB2E4B (nature_id), INDEX IDX_959E33AB4272FC9F (domaine_id), INDEX IDX_959E33ABA40AA975 (sous_domaine_id), INDEX IDX_959E33ABF6203804 (statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE natures (id INT AUTO_INCREMENT NOT NULL, nature VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_domaines (id INT AUTO_INCREMENT NOT NULL, sous_domaine VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuts (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE versions (id INT AUTO_INCREMENT NOT NULL, sujet_id INT NOT NULL, date DATETIME NOT NULL, contenu LONGTEXT NOT NULL, porteur VARCHAR(255) NOT NULL, delai VARCHAR(255) NOT NULL, avancement VARCHAR(255) NOT NULL, INDEX IDX_19DC40D27C4D497E (sujet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sujets ADD CONSTRAINT FK_959E33AB3BCB2E4B FOREIGN KEY (nature_id) REFERENCES natures (id)');
        $this->addSql('ALTER TABLE sujets ADD CONSTRAINT FK_959E33AB4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaines (id)');
        $this->addSql('ALTER TABLE sujets ADD CONSTRAINT FK_959E33ABA40AA975 FOREIGN KEY (sous_domaine_id) REFERENCES sous_domaines (id)');
        $this->addSql('ALTER TABLE sujets ADD CONSTRAINT FK_959E33ABF6203804 FOREIGN KEY (statut_id) REFERENCES statuts (id)');
        $this->addSql('ALTER TABLE versions ADD CONSTRAINT FK_19DC40D27C4D497E FOREIGN KEY (sujet_id) REFERENCES sujets (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sujets DROP FOREIGN KEY FK_959E33AB4272FC9F');
        $this->addSql('ALTER TABLE versions DROP FOREIGN KEY FK_19DC40D27C4D497E');
        $this->addSql('ALTER TABLE sujets DROP FOREIGN KEY FK_959E33AB3BCB2E4B');
        $this->addSql('ALTER TABLE sujets DROP FOREIGN KEY FK_959E33ABA40AA975');
        $this->addSql('ALTER TABLE sujets DROP FOREIGN KEY FK_959E33ABF6203804');
        $this->addSql('DROP TABLE domaines');
        $this->addSql('DROP TABLE sujets');
        $this->addSql('DROP TABLE natures');
        $this->addSql('DROP TABLE sous_domaines');
        $this->addSql('DROP TABLE statuts');
        $this->addSql('DROP TABLE versions');
    }
}
