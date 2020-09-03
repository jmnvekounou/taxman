<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200901134054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, date DATE NOT NULL, provider VARCHAR(255) NOT NULL, amount NUMERIC(10, 2) NOT NULL, tps NUMERIC(5, 2) DEFAULT NULL, tvq NUMERIC(5, 2) DEFAULT NULL, tvh NUMERIC(5, 2) DEFAULT NULL, INDEX IDX_2496F35BC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE income (id INT AUTO_INCREMENT NOT NULL, billnumber VARCHAR(255) NOT NULL, amount NUMERIC(10, 2) NOT NULL, tps NUMERIC(5, 2) DEFAULT NULL, tvq NUMERIC(5, 2) DEFAULT NULL, tvh NUMERIC(5, 2) DEFAULT NULL, total NUMERIC(10, 2) NOT NULL, received_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35BC54C8C93 FOREIGN KEY (type_id) REFERENCES expense_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35BC54C8C93');
        $this->addSql('DROP TABLE expense_type');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('DROP TABLE income');
    }
}
