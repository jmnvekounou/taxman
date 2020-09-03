<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200901135347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, addressone VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, addressone VARCHAR(255) NOT NULL, addressetwo VARCHAR(255) DEFAULT NULL, phoneone VARCHAR(255) NOT NULL, phonetwo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expenses ADD provider_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35BA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('CREATE INDEX IDX_2496F35BA53A8AA ON expenses (provider_id)');
        $this->addSql('ALTER TABLE income ADD customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE income ADD CONSTRAINT FK_3FA862D09395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_3FA862D09395C3F3 ON income (customer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE income DROP FOREIGN KEY FK_3FA862D09395C3F3');
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35BA53A8AA');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP INDEX IDX_2496F35BA53A8AA ON expenses');
        $this->addSql('ALTER TABLE expenses DROP provider_id');
        $this->addSql('DROP INDEX IDX_3FA862D09395C3F3 ON income');
        $this->addSql('ALTER TABLE income DROP customer_id');
    }
}
