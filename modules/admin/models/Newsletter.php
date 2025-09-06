<?php

/**
 * This is the model class for table "newsletter".
 *
 * The followings are the available columns in table 'newsletter':
 * @property integer $idnewsletter
 * @property string $titulo
 * @property string $titulo_seo
 * @property string $subtitulo
 * @property string $contenido
 * @property string $fuente
 * @property string $fecha_publicacion
 * @property integer $activo
 * @property string $created
 * @property string $modified
 */
class Newsletter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Newsletter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'newsletter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, titulo_seo, contenido, activo, created, modified', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('titulo, fuente, fecha_publicacion', 'length', 'max'=>45),
			array('titulo_seo', 'length', 'max'=>255),
			array('subtitulo', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idnewsletter, titulo, titulo_seo, subtitulo, contenido, fuente, fecha_publicacion, activo, created, modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnewsletter' => 'Idnewsletter',
			'titulo' => 'Titulo',
			'titulo_seo' => 'Titulo Seo',
			'subtitulo' => 'Subtitulo',
			'contenido' => 'Contenido',
			'fuente' => 'Fuente',
			'fecha_publicacion' => 'Fecha Publicacion',
			'activo' => 'Enviado',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idnewsletter',$this->idnewsletter);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('titulo_seo',$this->titulo_seo,true);
		$criteria->compare('subtitulo',$this->subtitulo,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('fuente',$this->fuente,true);
		$criteria->compare('fecha_publicacion',$this->fecha_publicacion,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}