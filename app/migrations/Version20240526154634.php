<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240526154634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates Incomes table, adds description column to Expenses table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE incomes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE incomes (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, amount VARCHAR(255) NOT NULL, income_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN incomes.income_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE expenses ADD description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE incomes_id_seq CASCADE');
        $this->addSql('DROP TABLE incomes');
        $this->addSql('ALTER TABLE expenses DROP description');
    }
}
