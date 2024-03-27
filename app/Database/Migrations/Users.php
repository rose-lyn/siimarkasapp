<?php
namespace App\Database\Migrations;
 
use CodeIgniter\Database\Migration;
 
class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'nia'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]
 
		]);
		$this->forge->addPrimaryKey('nia', true);
		$this->forge->createTable('t_users');
	}
 
	//--------------------------------------------------------------------
 
	public function down()
	{
		$this->forge->dropTable('t_users');
	}
}