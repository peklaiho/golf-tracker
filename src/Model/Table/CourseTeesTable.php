<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseTees Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\CourseHoleDistancesTable&\Cake\ORM\Association\HasMany $CourseHoleDistances
 * @property \App\Model\Table\RoundsTable&\Cake\ORM\Association\HasMany $Rounds
 *
 * @method \App\Model\Entity\CourseTee newEmptyEntity()
 * @method \App\Model\Entity\CourseTee newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CourseTee> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseTee get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CourseTee findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CourseTee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CourseTee> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseTee|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CourseTee saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CourseTee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseTee>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseTee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseTee> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseTee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseTee>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseTee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseTee> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CourseTeesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('course_tees');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CourseHoleDistances', [
            'foreignKey' => 'course_tee_id',
        ]);
        $this->hasMany('Rounds', [
            'foreignKey' => 'course_tee_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('course_id')
            ->notEmptyString('course_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('cr')
            ->allowEmptyString('cr');

        $validator
            ->integer('slope')
            ->allowEmptyString('slope');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['course_id'], 'Courses'), ['errorField' => 'course_id']);

        return $rules;
    }
}
